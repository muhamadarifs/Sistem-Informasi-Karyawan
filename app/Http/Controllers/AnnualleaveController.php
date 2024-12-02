<?php

namespace App\Http\Controllers;

use App\Models\AnnualLeave;
use App\Models\LeaveBalance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AnnualleaveController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     if ($user->saldo_diberikan == 1) {
    //         DB::table('users')->where('id', $user->id)->save(['saldo_cuti' => $user->saldo_cuti + 1 ]);
    //     }
    //     $annualLeave = LeaveBalance::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

    //     $saldoCuti = $user->saldo_cuti;
    //     if ($saldoCuti > 0) {
    //         $message = "Kamu memiliki " . $saldoCuti . " saldo cuti yang dapat digunakan.";
    //     } else {
    //         $message = "Kamu tidak punya saldo cuti, karena no data available";
    //     }
    //     return view('myinfo.annual-leave', compact('user', 'annualLeave', 'message'), [
    //         'title' => 'Annual Leave Balance',
    //     ]);
    // }

    // public function riwayatSaldoCutiBulanSebelumnya()
    // {
    //     $today = Carbon::now();
    //     $bulanIni = $today->month;
    //     $tahunIni = $today->year;

    //     // Hitung bulan sebelumnya
    //     $bulanSebelumnya = $bulanIni - 1;
    //     $tahunSebelumnya = $tahunIni;

    //     if ($bulanSebelumnya == 0) {
    //         $bulanSebelumnya = 12;
    //         $tahunSebelumnya--;
    //     }

    //     $saldoCutiUpdates = User::select('name', 'saldo_cuti', 'created_at')
    //         ->whereYear('created_at', $tahunSebelumnya)
    //         ->whereMonth('created_at', $bulanSebelumnya)
    //         ->get();

    //     return view('myinfo.leavebalance-his', [
    //         'saldoCutiUpdates' => $saldoCutiUpdates,
    //         'title' => 'Leave Balance History',
    //     ]);
    // }
}
