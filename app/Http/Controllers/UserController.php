<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UserImport;
use App\Mail\DefaultPasswordEmail;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\Position;
use App\Models\Sign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.pages-register');
    }

    // menampilkan profile
    public function showuser()
    {
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();
        return view('auth.profile', compact('user','sign' ), [
            "title" => "Profile"
        ]);
    }

    // menampilkan form edit profiles
    public function editProfile()
    {
        $user = Auth::user();
        return view('auth.profileupdate', compact('user'), [
            "title" => "Profile Update"
        ]);
    }

    public function detailsProfile()
    {
        $user = Auth::user();
        return view('auth.profiledetail', compact('user'), [
            "title" => "Profile Detail"
        ]);
    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportUsersPdf()
    {
        $users = User::all();
        // view()->share('users', $users);
        $pdf = PDF::loadview('pdf.exportuser', compact('users'));
        return $pdf->download('data.pdf');

    }

    public function importUsers(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        try {
            $data = $request->file('file');

            Excel::import(new UserImport, $data);
            $newlyImportedUsers = User::whereNull('password')->get();
            foreach ($newlyImportedUsers as $user) {
                $firstName = explode(' ', $user->name)[0];
                $defaultPassword = $firstName . '123456';
                $user->password = Hash::make($defaultPassword);
                $user->save();
            }

            Alert::success('Success', 'Data has been Import');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to import data: '.$e->getMessage());
        }
        return redirect()->back();


    }

    public function changePassword(){
        $user = Auth::user();
        return view('auth.profile.changepassword',[
            "title" => 'Change Password',
            'user' => $user,
        ]);
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if(!Hash::check($request->current_password, auth()->user()->password)){
            Alert::error('Error', "Old Password Doesn't match!");
            return back();
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        Alert::success('Success', 'Password changed successfully!');
        return back();
    }

    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'employee_id' => 'required',
            'name' => 'required',
            'position_id' => 'required',
            'position_name' => 'required',
            'home_base' => 'required',
            'date_hire' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'emergency_contact' => 'required',
            'status_keluarga' => 'required',
            'anak' => 'required',
            'bank_account' => 'required',
            'npwp' => 'required',
            'bpjs_kesehatan' => 'required',
            'bpjs_tk' => 'required',
            'basic' => 'required',
            'allowance' => 'required',
            'foreman' => 'required',
            'my_allow' => 'required',
            'other' => 'required',
            'email' => 'required|email:dns',
            'group' => 'required',
            'education' => 'required',
            'ras' => 'required',
            'agama' => 'required',
            'size_baju' => 'required',
            'size_sepatu' => 'required',
            'contract_start' => 'required',
            'finish_contract' => 'required',
            'date_terminated' => 'nullable',
            'reason' => 'nullable',
            'status' => 'required',
            'spouse' => 'required_if:status_keluarga,Maried',
            'spouse_gender' => 'required_if:status_keluarga,Maried',
            'spouse_DOB' => 'required_if:status_keluarga,Maried',
            'child1' => 'nullable',
            'child1_gender' => 'nullable',
            'child1_DOB' => 'nullable',
            'child2' => 'nullable',
            'child2_gender' => 'nullable',
            'child2_DOB' => 'nullable',
            'child3' => 'nullable',
            'child3_gender' => 'nullable',
            'child3_DOB' => 'nullable',
            'role' => 'required',
            'level' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);
        Alert::success('Success', 'Data has been update');
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            Alert::success('Success', 'Data has been delete.');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal Menghapus Data : ' . $e->getMessage())->persistent(true);
            return redirect()->back();
        }
    }

    public function sendDefaultLogin(Request $request){
        try {
            $users = User::whereNotNull('email')->get();
            $successCount = 0;

            foreach ($users as $user) {
                $firstName = explode(' ', $user->name)[0];
                $defaultPassword = $firstName . '123456';

                Mail::to($user->email)->send(new DefaultPasswordEmail($user, $defaultPassword));
                $successCount++;
            }
            if ($successCount > 0) {
                $message = "The default email and password have been successfully sent to " . $successCount . " user.";
                Alert::success('Success', $message);
            } else {
                Alert::info('Info', 'Neither user has an email address.');
            }
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Send Email and Password: '.$e->getMessage());
        }
        return redirect()->back();
    }

    public function templateUser()
    {
        $file_path = public_path('Template Import/Users.xlsx');
        return Response::download($file_path, 'User Import Template.xlsx');
    }

    public function storeLinkBpjs(Request $request){
        try {
            $validatedData = $request->validate([
                'bpjs_filelinks' => 'required'
            ]);
            $user = User::find(Auth::id());
            $user->update($validatedData);
            Alert::success('Success', 'Successfully added links');
            return redirect()->back();
        } catch (\Throwable $e) {
            Alert::error('Error', 'Failed to Add Links : ' . $e->getMessage())->persistent(true);
            return redirect()->back();
        }
    }

    public function storeLinkBpjsTK(Request $request){
        try {
            $validatedData = $request->validate([
                'bpjstk_filelinks' => 'required'
            ]);
            $user = User::find(Auth::id());
            $user->update($validatedData);
            Alert::success('Success', 'Successfully added links');
            return redirect()->back();
        } catch (\Throwable $e) {
            Alert::error('Error', 'Failed to Add Links : ' . $e->getMessage())->persistent(true);
            return redirect()->back();
        }
    }

    public function storeLinkktp(Request $request){
        try {
            $validatedData = $request->validate([
                'file_ktp' => 'required'
            ]);
            $user = User::find(Auth::id());
            $user->update($validatedData);
            Alert::success('Success', 'Successfully added links');
            return redirect()->back();
        } catch (\Throwable $e) {
            Alert::error('Error', 'Failed to Add Links : ' . $e->getMessage())->persistent(true);
            return redirect()->back();
        }
    }
}
