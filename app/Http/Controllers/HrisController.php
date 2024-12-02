<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Models\CompanyRegDve;
use App\Models\CompanyRegFM;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\CompanyRegulation;
use App\Models\JobDescription;
use App\Models\Payslip;
use App\Models\Absensi;
use App\Models\QrCodePayslips;
use App\Models\QrPayslip;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class HrisController extends Controller
{

    public function viewHRIS()
    {
        $users = User::with('position')
            ->orderBy('id', 'asc')
            ->get();
        $position = Position::all();
        $payslip = Payslip::with(['user'])->get();

        return view('hris', [
            'users' => $users,
            'position' => $position,
            'payslip' => $payslip,
            'title' => "HRIS Home"
        ]);
    }

    // public function addUser(Request $request){
    //     $validatedData = $request->validate([
    //         'nik' => 'required|unique:Users',
    //         'employee_id' => 'required',
    //         'name' => 'required|max:255',
    //         'tempat_lahir' => 'required',
    //         'tgl_lahir' => 'required',
    //         'jenis_kelamin' => 'required',
    //         'alamat' => 'required',
    //         'email' => 'required|email:dns|unique:Users',
    //         'telp' => 'required',
    //         'position_id' => 'required',
    //     ]);

    //     $firstName = explode(' ', $validatedData['name'])[0];
    //     $defaultPassword = $firstName . '123456';
    //     $validatedData['password'] = bcrypt($defaultPassword);

    //     $user = User::create($validatedData);
    //     // event(new UserCreated($user));

    //     Alert::success('Sukses', 'Data berhasil ditambahkan');
    //     return redirect()->back();

    // }

    

    

    




}
