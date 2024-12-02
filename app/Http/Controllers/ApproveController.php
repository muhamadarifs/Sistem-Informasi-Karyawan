<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnnualLeave;
use Illuminate\Support\Facades\Auth;
use App\Models\Sign;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ApproveController extends Controller
{
    // public function approve($id)
    // {
    //     $leave = AnnualLeave::find($id);
    //     $leave->status = 'Approved';

    //     $leave->approver_1 = Auth::user()->name;
    //     $leave->approval_date_1 = Carbon::now();
    //     $leave->save();

    //     return redirect()->route('AnnualLeaveindex')->with('success', 'Leave request has been approved.'); viewApprovespv
    // }

    // public function approveStage1($id){
    //     $leave = AnnualLeave::find($id);
    //     if ($leave->status === 'waiting') {
    //         $leave->status = 'Approved Supervisor';
    //         $leave->approver_1 = Auth::user()->name;
    //         $leave->approval_date_1 = Carbon::now();
    //         $leave->save();

    //         // Mendapatkan atasan user yang melakukan approve (contoh: role 'manager')
    //         $approver1 = Auth::user();
    //         $superiorName = $approver1->superior_name;
    //         $manager = User::whereHas('position', function ($query) use ($superiorName) {
    //             $query->where('position_id', $superiorName);
    //         })->first();


    //         // Kirim notifikasi atau arahkan ke halaman atasan
    //         if (!$manager) {
    //             $leave->status = 'waiting';
    //             $leave->save();
    //             return redirect()->route('viewApprovespv')->with('error', 'No manager found for notification. Status reverted to waiting.');

    //         }

    //         return redirect()->route('viewApprovemngr')->with('success', 'Leave request has been approved (Stage 1).');
    //     }

    //     // Kasus jika status bukan 'pending', bisa ditangani sesuai kebutuhan
    //     return redirect()->route('viewApprovespv')->with('error', 'Invalid leave request status for Stage 1 approval.');
    // }




    // public function approvespv($id)
    // {
    //     try{
    //     $leave = AnnualLeave::findOrFail($id);
    //     $leave->approver_1 = Auth::user()->name;
    //     $leave->approval_date_1 = Carbon::now();
    //     $leave->save();

    //     Alert::success('Success', 'Data Berhasil diperbarui');
    //     return redirect()->back();
    //    } catch (\Exception $e) {
    //     Alert::error('Error', 'Gagal Memperbarui data. terjadi kesalahan : ' . $e->getMessage());
    //     return redirect()->back();
    //    }
    // }

}
