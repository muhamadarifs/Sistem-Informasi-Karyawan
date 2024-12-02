<?php

namespace App\Http\Controllers;

use App\Models\DataChange;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\JobDescription;
use App\Models\Payslip;
use App\Models\Position;
use App\Models\QrCodePayslips;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ToolsController extends Controller
{
    public function index(){
        return view('tools.index',[
            "title" => "Tools",
            "title2" => "Tools"
        ]);
    }

    public function indexCuti(){
        $user = User::with('position')->get();

        return view('tools.kuotacuti',[
            'user' => $user,
            'title' => 'Balance Leave',
        ]);
    }

    public function indexEmployee(Request $request){
        $users = User::with('position')
            ->orderBy('id', 'asc')
            ->get();
        $position = Position::all();

        return view('tools.employee', [
            'users' => $users,
            'position' => $position,
            'title' => "Employee"
        ]);
    }
    public function addUser(Request $request){
        $validatedData = $request->validate([
            'nik' => 'required|unique:Users',
            'employee_id' => 'required',
            'name' => 'required|max:255',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => 'required|email:dns|unique:Users',
            'telp' => 'required',
            'position_id' => 'required',
        ]);

        $firstName = explode(' ', $validatedData['name'])[0];
        $defaultPassword = $firstName . '123456';
        $validatedData['password'] = bcrypt($defaultPassword);
        User::create($validatedData);

        Alert::success('Success', 'Data added successfully');
        return redirect()->back();
    }

    public function indexPayslip(){
        $payslip = Payslip::with(['user'])->get();

        return view('tools.payslip', [
            'payslip' => $payslip,
            'title' => "Payslip Admin"
        ]);
    }

    public function indexQr(){
        $Qr = QrCodePayslips::orderBy('created_at', 'desc')->get();
        return view('tools.QrPayslip',[
            'Qr'=> $Qr,
            'title' => 'Qr Code Payslip'
        ]);
    }

    public function storeQr(Request $request){
        try {
            $validatedData = $request->validate([
                'periode' => 'required',
                'qrcode' => 'required|mimes:png,jpg|max:10280',
            ]);

            if ($request->hasFile('qrcode')) {
                $file = $request->file('qrcode');
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalName . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images/QRCodes/'. $fileName);
                $validatedData['qrcode'] = $fileName;
                
                QrCodePayslips::create($validatedData);
                Alert::success('Success', 'Qr data added successfully');
                return redirect()->back();
            } else {
                throw new \Exception('File not found.');
            }
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to add Qr: ' . $e->getMessage())->persistent(true);
            return redirect()->back()->withInput();
        }
    }

    public function destroyQr($id){
        try {
            $qr = QrCodePayslips::findOrFail($id);
            $qrfile = $qr->qrcode;
            $qr->delete();

            if (!empty($qrfile)) {
                try {
                    Storage::delete('public/images/QRCodes/' . $qrfile);
                    Alert::success('Success', 'QR Has been Delete.');
                } catch (\Exception $e) {
                    Alert::warning('Warning', 'Data has been deleted but failed to delete the associated file.');
                }
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed Delete Qr: ' . $e->getMessage())->persistent(true);
            return redirect()->back();
        }
    }

    public function indexAccess(){
        $users = User::with('position')
            ->orderBy('id', 'asc')
            ->get();
        return view('tools.access', [
            'title' => 'Access Permission',
            'users' => $users,
        ]);
    }

    public function indexDataChange(){
        $data = DataChange::with('user')->orderBy('created_at', 'desc')->get();
        return view('tools.request-datachange', [
            'title' => 'Data Change Request',
            'data' => $data,
        ]);
    }
}
