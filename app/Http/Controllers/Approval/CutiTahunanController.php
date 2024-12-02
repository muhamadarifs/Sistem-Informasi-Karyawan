<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnnualLeave;
use Illuminate\Support\Facades\Auth;
use App\Models\Sign;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class CutiTahunanController extends Controller
{
    public function index(){
        $user = Auth::user();
        $cutiBawahan = [];
        $approve2 = [];
        $approvedLeaves = [];

        // Jika pengguna memiliki peran Developer, berikan akses penuh
        if ($user->role === 'Developer') {
            $approvedLeaves = AnnualLeave::whereNotNull('approve1_name')
                ->whereNotNull('approve2_name')
                ->get();
        } else {
            // Jika bukan Developer, lakukan kueri berdasarkan posisi pengguna
            if ($user->position) {
                $cutiBawahan = AnnualLeave::where('superior_code', $user->position->position_code)->orderBy('created_at', 'desc')->get();
                $approve2 = AnnualLeave::where('hod_approver_1', $user->position->position_code)->orderBy('created_at', 'desc')->get();

                $hasHRGA1 = User::whereHas('position', function($query){
                    $query->where('position_code', 'HRGA1');
                })->exists();

                if(!$hasHRGA1 && $user->position->position_code == 'MGT5'){
                    $approve2 = AnnualLeave::where('hod_approver_1', 'HRGA1')->orderBy('created_at', 'desc')->get();
                }

                $hasLOG1 = User::whereHas('position', function($query){
                    $query->where('position_code', 'LOG1');
                })->exists();

                if(!$hasLOG1 && $user->position->position_code == 'MGT7'){
                    $approve2 = AnnualLeave::where('hod_approver_1', 'LOG1')->orderBy('created_at', 'desc')->get();
                };
            }
            $approvedLeaves = AnnualLeave::whereNotNull('approve1_name')
                ->whereNotNull('approve2_name')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('approvecuti.cutitahunan', [
            'cutiBawahan' => $cutiBawahan,
            'approve2' => $approve2,
            'approvedLeaves' => $approvedLeaves,
            'title' => "Approval Annual Leave"
        ]);
    }

    public function indexForm($id)
    {
        $leave = AnnualLeave::findOrFail($id);
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();
        return view('approvecuti.tahunan.index',[
            'title' => "Cuti Tahunan",
            'leave' => $leave,
            'sign' => $sign,
        ]);
    }

    public function detailsForm($id)
    {
        $leave = AnnualLeave::findOrFail($id);
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();
        return view('approvecuti.tahunan.details',[
            'title' => "Cuti Tahunan",
            'leave' => $leave,
            'sign' => $sign,
        ]);
    }

    public function approvespv($id)
    {
        try{
        $leave = AnnualLeave::findOrFail($id);

        $firstName = explode(' ', auth()->user()->name)[0];
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
        return redirect()->route('annualleave.index');
       } catch (\Exception $e) {
        Alert::error('Error', 'Failed to Approve. there is an error : ' . $e->getMessage());
        return redirect()->route('annualleave.index');
        // route('review.index')
       }
    }

    public function rejectspv($id)
    {
        try {
            $leave = AnnualLeave::findOrFail($id);
            $leave->approve1_name = Auth::user()->position->position_name;
            $leave->approve1_sign = 'Reject';
            $leave->approval1_date = Carbon::now();
            $leave->remarks = 'Maaf pengajuan cuti tahunan anda belum dapat disetujui ! / Sorry, your annual leave application has been Rejected !';
            $leave->status = 'reject';
            $leave->save();

            Alert::success('Success', 'Reject Annual Leave Success');
            return redirect()->route('annualleave.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Reject. There is an error : ' . $e->getMessage());
            return redirect()->route('annualleave.index');
        }
    }

    public function approvehod($id)
    {
        try{
        $leave = AnnualLeave::findOrFail($id);
        $user = $leave->user;

        $firstName = explode(' ', auth()->user()->name)[0];
        $existingSign = Sign::where('user_id', auth()->user()->id)->first();

        if (!$existingSign) {
            throw new \Exception('User signature not found.');
        }
        $leave->approve2_name = Auth::user()->position->position_name;
        $leave->approve2_sign = $existingSign->sign;
        $leave->approval2_date = Carbon::now();
        $leave->remarks = 'Selamat pengajuan cuti tahunan anda telah disetujui! / Congratulations, your annual leave application has been approved!';
        $leave->status = 'approved';
        $leave->save();

        $user->saldo_cuti -= $leave->jumlah_hari;
        $user->save();

        Alert::success('Success', 'Approved Success');
        return redirect()->route('annualleave.index');
    } catch (\Exception $e) {
        Alert::error('Error', 'Failed to Approve. there is an error : ' . $e->getMessage());
        return redirect()->back();
       }
    }

    public function rejecthod($id)
    {
        try {
            $leave = AnnualLeave::findOrFail($id);
            $leave->approve2_name = Auth::user()->position->position_name;
            $leave->approve2_sign = 'Reject';
            $leave->approval2_date = Carbon::now();
            $leave->remarks = 'Maaf pengajuan cuti tahunan anda belum dapat disetujui ! / Sorry, your annual leave application has been Rejected !';
            $leave->status = 'reject';
            $leave->save();

            Alert::success('Success', 'Reject Annual Leave Success');
            return redirect()->route('annualleave.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Reject. There is an error : ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
