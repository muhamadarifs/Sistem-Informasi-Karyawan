<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sign;
use App\Models\SpecialLeave;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CutiSpecialController extends Controller
{
    public function index(){
        $user = Auth::user();
        $cutiBawahan = [];
        $approve2 = [];
        $approvedLeaves = [];

        // Jika pengguna memiliki peran Developer, berikan akses penuh
        if ($user->role === 'Developer') {
            $approvedLeaves = SpecialLeave::whereNotNull('approve1_name')
                ->whereNotNull('approve2_name')
                ->with('user')
                ->get();
        } else {
            // Jika bukan Developer, lakukan kueri berdasarkan posisi pengguna
            if ($user->position) {
                $cutiBawahan = SpecialLeave::where('superior_code', $user->position->position_code)->with('user')->orderBy('created_at', 'desc')->get();
                $approve2 = SpecialLeave::where('hod_approver_1', $user->position->position_code)->with('user')->orderBy('created_at', 'desc')->get();

                // Ketentuan Jika tidak terdapat user dengan position HRGA1 (HRGA Manager) -> MGT5 (Asst. General Manager)
                $hasHRGA1 = User::whereHas('position', function($query){
                    $query->where('position_code', 'HRGA1');
                })->exists();
                if(!$hasHRGA1 && $user->position->position_code == 'MGT5'){
                    $approve2 = SpecialLeave::where('hod_approver_1', 'HRGA1')->with('user')->orderBy('created_at', 'desc')->get();
                }

                // Ketentuan Jika tidak terdapat user dengan position LOG1 (Logistic Manager) -> MGT7 (Supply Chain Manager)
                $hasLOG1 = User::whereHas('position', function($query){
                    $query->where('position_code', 'LOG1');
                })->exists();
                if(!$hasLOG1 && $user->position->position_code == 'MGT7'){
                    $approve2 = SpecialLeave::where('hod_approver_1', 'LOG1')->with('user')->orderBy('created_at', 'desc')->get();
                };
            }
            $approvedLeaves = SpecialLeave::whereNotNull('approve1_name')
                ->whereNotNull('approve2_name')
                ->with('user')->orderBy('created_at', 'desc')
                ->get();
        }

        return view('approvecuti.cutispecial', [
            'cutiBawahan' => $cutiBawahan,
            'approve2' => $approve2,
            'approvedLeaves' => $approvedLeaves,
            'title' => "Approval Special Leave"
        ]);
    }

    public function indexForm($id)
    {
        $leave = SpecialLeave::findOrFail($id);
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();
        return view('approvecuti.special.index',[
            'title' => "Special Leave",
            'leave' => $leave,
            'sign' => $sign,
        ]);
    }

    public function detailsForm($id)
    {
        $leave = SpecialLeave::findOrFail($id);
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();
        return view('approvecuti.special.details',[
            'title' => "Special Leave",
            'leave' => $leave,
            'sign' => $sign,
        ]);
    }

    public function approvespv($id)
    {
        try{
        $leave = SpecialLeave::findOrFail($id);

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
        return redirect()->route('specialleave.index');
       } catch (\Exception $e) {
        Alert::error('Error', 'Failed to Approve. there is an error : ' . $e->getMessage());
        return redirect()->route('specialleave.index');
        // route('review.index')
       }
    }

    public function rejectspv($id)
    {
        try {
            $leave = SpecialLeave::findOrFail($id);
            $leave->approve1_name = Auth::user()->position->position_name;
            $leave->approve1_sign = 'Reject';
            $leave->approval1_date = Carbon::now();
            $leave->remarks = 'Maaf Pengajuan cuti anda belum dapat disetujui ! / Sorry, your leave application has been Rejected!';
            $leave->status = 'reject';
            $leave->save();

            Alert::success('Success', 'Reject Annual Leave Success');
            return redirect()->route('specialleave.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Reject. There is an error : ' . $e->getMessage());
            return redirect()->route('specialleave.index');
        }
    }

    public function approvehod($id)
    {
        try{
        $leave = SpecialLeave::findOrFail($id);
        $user = $leave->user;

        $firstName = explode(' ', auth()->user()->name)[0];
        $existingSign = Sign::where('user_id', auth()->user()->id)->first();

        if (!$existingSign) {
            throw new \Exception('User signature not found.');
        }
        $leave->approve2_name = Auth::user()->position->position_name;
        $leave->approve2_sign = $existingSign->sign;
        $leave->approval2_date = Carbon::now();
        $leave->remarks = 'Selamat Pengajuan Cuti anda telah disetujui ! / Congratulations, your leave application has been approved!';
        $leave->status = 'approved';
        $leave->save();


        Alert::success('Success', 'Approved Success');
        return redirect()->route('specialleave.index');
    } catch (\Exception $e) {
        Alert::error('Error', 'Failed to Approve. there is an error : ' . $e->getMessage());
        return redirect()->back();
       }
    }

    public function rejecthod($id)
    {
        try {
            $leave = SpecialLeave::findOrFail($id);
            $leave->approve2_name = Auth::user()->position->position_name;
            $leave->approve2_sign = 'Reject';
            $leave->approval2_date = Carbon::now();
            $leave->remarks = 'Maaf Pengajuan cuti anda belum dapat disetujui ! / Sorry, your leave application has been Rejected!';
            $leave->status = 'reject';
            $leave->save();

            Alert::success('Success', 'Reject Annual Leave Success');
            return redirect()->route('specialleave.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Reject. There is an error : ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
