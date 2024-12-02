<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use App\Models\Sign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PermitController extends Controller
{
    public function index(){
        $user = Auth::user();
        $cutiBawahan = [];
        $approve2 = [];
        $approvedLeaves = [];
        $approveunpaid = [];

        // if Developer, berikan akses penuh
        if ($user->role === 'Developer') {
            $approvedLeaves = Permit::whereNotNull('approve1_name')
                ->whereNotNull('approve2_name')
                ->get();
        } else {
            // else Developer, lakukan kueri berdasarkan posisi pengguna
            if ($user->position) {
                $cutiBawahan = Permit::where('superior_code', $user->position->position_code)->orderBy('created_at', 'desc')->get();
                $approve2 = Permit::where('hod_approver_1', $user->position->position_code)->orderBy('created_at', 'desc')->get();

                $hasHRGA1 = User::whereHas('position', function($query){
                    $query->where('position_code', 'HRGA1');
                })->exists();

                if(!$hasHRGA1 && $user->position->position_code == 'MGT5'){
                    $approve2 = Permit::where('hod_approver_1', 'HRGA1')->orderBy('created_at', 'desc')->get();
                }

                $hasLOG1 = User::whereHas('position', function($query){
                    $query->where('position_code', 'LOG1');
                })->exists();

                if(!$hasLOG1 && $user->position->position_code == 'MGT7'){
                    $approve2 = Permit::where('hod_approver_1', 'LOG1')->orderBy('created_at', 'desc')->get();
                };
            }
            $approvedLeaves = Permit::whereNotNull('approve1_name')
                ->whereNotNull('approve2_name')->orderBy('created_at', 'desc')
                ->get();
        }

        if($user->position->position_code == 'MGT5'){
            $approveunpaid = Permit::where('permit', 'Unpaid Leave')->orderBy('created_at', 'desc')->get();
        }

        return view('approvecuti.permit', [
            'cutiBawahan' => $cutiBawahan,
            'approve2' => $approve2,
            'approvedLeaves' => $approvedLeaves,
            'approveunpaid' => $approveunpaid,
            'title' => "Approval Permit"
        ]);
    }

    public function indexForm($id)
    {
        $leave = Permit::findOrFail($id);
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();
        return view('approvecuti.permit.index',[
            'title' => "Permit",
            'leave' => $leave,
            'sign' => $sign,
        ]);
    }

    public function detailsForm($id){
        $leave = Permit::findOrFail($id);
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();
        return view('approvecuti.permit.details',[
            'title' => "Permit",
            'leave' => $leave,
            'sign' => $sign,
        ]);
    }

    public function unpaidForm($id){
        $leave = Permit::findOrFail($id);
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();
        return view('approvecuti.permit.unpaidleave',[
            'title' => "Permit",
            'leave' => $leave,
            'sign' => $sign,
        ]);
    }

    public function approvespv($id)
    {
        try{
        $leave = Permit::findOrFail($id);

        $existingSign = Sign::where('user_id', auth()->user()->id)->first();

        if (!$existingSign) {
            throw new \Exception('User signature not found.');
        }

        $leave->approve1_name = Auth::user()->position->position_name;
        $leave->hod_approver_1 = Auth::user()->position->superior_code;
        $leave->approve1_sign = $existingSign->sign;
        $leave->approval1_date = Carbon::now();
        $leave->save();

        Alert::success('Success', 'Approved Success');
        return redirect()->route('permit.index');
       } catch (\Exception $e) {
        Alert::error('Error', 'Failed to Approve. there is an error : ' . $e->getMessage());
        return redirect()->route('permit.index');
       }
    }

    public function rejectspv($id)
    {
        try {
            $leave = Permit::findOrFail($id);
            $leave->approve1_name = Auth::user()->position->position_name;
            $leave->approve1_sign = 'Reject';
            $leave->approval1_date = Carbon::now();
            $leave->remarks = 'Maaf pengajuan izin anda belum dapat disetujui ! / Sorry, your permit application has been rejected !';
            $leave->status = 'reject';
            $leave->save();

            Alert::success('Success', 'Reject Annual Leave Success');
            return redirect()->route('permit.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Reject. There is an error : ' . $e->getMessage());
            return redirect()->route('permit.index');
        }
    }

    public function approvehod($id)
    {
        try{
        $leave = Permit::findOrFail($id);
        $existingSign = Sign::where('user_id', auth()->user()->id)->first();

        if (!$existingSign) {
            throw new \Exception('User signature not found.');
        }
        $leave->approve2_name = Auth::user()->position->position_name;
        $leave->approve2_sign = $existingSign->sign;
        $leave->approval2_date = Carbon::now();

        if ($leave->permit == 'Pulang Cepat' || $leave->permit == 'Datang Terlambat'){
            $leave->status = 'approved';
            $leave->remarks = 'Selamat pengajuan izin anda disetujui ! / Congratulations, your permit application has been approved !';
        } elseif ($leave->permit == 'Unpaid Leave'){

        }

        $leave->save();

        Alert::success('Success', 'Approved Success');
        return redirect()->route('permit.index');
    } catch (\Exception $e) {
        Alert::error('Error', 'Failed to Approve. there is an error : ' . $e->getMessage());
        return redirect()->back();
       }
    }

    public function rejecthod($id)
    {
        try {
            $leave = Permit::findOrFail($id);
            $leave->approve2_name = Auth::user()->position->position_name;
            $leave->approve2_sign = 'Reject';
            $leave->approval2_date = Carbon::now();
            $leave->remarks = 'Maaf pengajuan izin anda belum dapat disetujui ! / Sorry, your permit application has been rejected !';
            $leave->status = 'reject';
            $leave->save();

            Alert::success('Success', 'Reject Annual Leave Success');
            return redirect()->route('permit.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Reject. There is an error : ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function approvemgt5($id)
    {
        try{
        $leave = Permit::findOrFail($id);
        $existingSign = Sign::where('user_id', auth()->user()->id)->first();

        if (!$existingSign) {
            throw new \Exception('Tanda tangan pengguna tidak ditemukan.');
        }
        $leave->approve3_name = Auth::user()->position->position_name;
        $leave->approve3_sign = $existingSign->sign;
        $leave->approval3_date = Carbon::now();
        $leave->remarks = 'Selamat pengajuan izin anda disetujui ! / Congratulations, your permit application has been approved !';
        $leave->status = 'approved';
        $leave->save();

        Alert::success('Success', 'Approved Success');
        return redirect()->route('permit.index');
    } catch (\Exception $e) {
        Alert::error('Error', 'Gagal Approve. terjadi kesalahan : ' . $e->getMessage());
        return redirect()->back();
       }
    }

    public function rejectmgt5($id)
    {
        try {
            $leave = Permit::findOrFail($id);
            $leave->approve3_name = Auth::user()->position->position_name;
            $leave->approve3_sign = 'Reject';
            $leave->approval3_date = Carbon::now();
            $leave->remarks = 'Maaf pengajuan izin anda belum dapat disetujui ! / Sorry, your permit application has been rejected !';
            $leave->status = 'reject';
            $leave->save();

            Alert::success('Success', 'Reject Annual Leave Success');
            return redirect()->route('permit.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal Reject. Terjadi kesalahan : ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
