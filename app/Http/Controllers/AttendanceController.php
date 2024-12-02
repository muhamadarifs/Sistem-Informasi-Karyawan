<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::now();

        if ($today->day >= 21) {
            $start_date = $today->copy()->startOfMonth()->addDays(19);
            $end_date = $today->copy()->addMonthNoOverflow()->startOfMonth()->addDays(19);
            $periode_start = $start_date->copy()->addDay();
        } else {
            $start_date = $today->copy()->subMonth()->startOfMonth()->addDays(19);
            $end_date = $today->copy()->startOfMonth()->addDays(19);
            $periode_start = $start_date->copy()->addDay();
        }

        $absensi = Absensi::where('user_id', $user->id)
                        ->where('tanggal', '>=', $start_date)
                        ->where('tanggal', '<=', $end_date)
                        ->orderBy('tanggal', 'asc')
                        ->get();

        $data = Absensi::where('user_id', $user->id)
                        ->first();

        return view('myinfo.attendance-report', [
            'user' => $user,
            'absensi'=> $absensi,
            'data'=> $data,
            'periode_start'=> $periode_start,
            'start_date' => $start_date,
            'end_date' => $end_date,
            "title" => "Attendance Report"
        ]);
    }

    public function filter(Request $request)
    {
        $user = Auth::user();
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));

        if ($startDate->day >= 21) {
            $startDate = $startDate->copy()->startOfMonth()->addDays(19);
            $endDate = $startDate->copy()->addMonthNoOverflow()->startOfMonth()->addDays(19);
            $periode_start = $startDate->copy()->addDay();
        } else {
            $startDate = $startDate->copy()->subMonth()->startOfMonth()->addDays(19);
            $endDate = $startDate->copy()->startOfMonth()->addDays(19);
            $periode_start = $startDate->copy()->addDay();
        }

        $absensi = Absensi::where('user_id', $user->id)
                            ->whereBetween('tanggal', [$startDate, $endDate])
                            ->orderBy('tanggal', 'asc')
                            ->get();

        $data = Absensi::where('user_id', $user->id)
        ->first();

        return view('myinfo.attendance-report', [
            'user' => $user,
            'data' => $data,
            'absensi' => $absensi,
            'periode_start' => $periode_start,
            'start_date' => $startDate,
            'end_date' => $endDate,
            "title" => "Attendance Report"
        ]);
    }

    public function downloadAttend(Request $request)
    {
        $absensi = Absensi::where('user_id', Auth::user()->id)
                    ->where('tanggal', '>=', $request->start_date)
                    ->where('tanggal', '<=', $request->end_date)
                    ->orderBy('tanggal', 'asc')
                    ->get();
        $data = Absensi::where('user_id', Auth::user()->id)
                    ->where('tanggal', '>=', $request->start_date)
                    ->where('tanggal', '<=', $request->end_date)
                    ->first();
        $countwh = Absensi::where('user_id', Auth::user()->id)
                    ->where('tanggal', '>=', $request->start_date)
                    ->where('tanggal', '<=', $request->end_date)
                    ->whereNotNull('total_wh')
                    ->get();   
        $datalibur = $absensi->where('tanggal', '>=', $request->start_date)
                    ->where('tanggal', '<=', $request->end_date)
                    ->where('total_wh', '00:00');

        $countworkingday = $countwh->count();         
        $countharilibur = $datalibur->count();

        $filename = 'attendance_report_' . $request->start_date . '_to_' . $request->end_date . '.pdf';
        $pdf = FacadePdf::loadView('pdf.fm.attendance', [
            'absensi' => $absensi,
            'data' => $data,
            'countworkingday' => $countworkingday,
            'countharilibur' => $countharilibur,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            "title" => "Attendance",
        ]);
        $pdf->setPaper('a4');
        return $pdf->stream($filename);
    }

    public function downloadAttendDVE(Request $request)
    {
        $absensi = Absensi::where('employee_id', Auth::user()->employee_id)
                    ->where('tanggal', '>=', $request->start_date)
                    ->where('tanggal', '<=', $request->end_date)
                    ->orderBy('tanggal', 'asc')
                    ->get();
        $data = Absensi::where('employee_id', Auth::user()->employee_id)
                    ->where('tanggal', '>=', $request->start_date)
                    ->where('tanggal', '<=', $request->end_date)
                    ->first();
        $countwh = Absensi::where('user_id', Auth::user()->id)
                    ->where('tanggal', '>=', $request->start_date)
                    ->where('tanggal', '<=', $request->end_date)
                    ->whereNotNull('total_wh')
                    ->get();
        $datalibur = $absensi->where('tanggal', '>=', $request->start_date)
                    ->where('tanggal', '<=', $request->end_date)
                    ->where('total_wh', '00:00');

        $countworkingday = $countwh->count(); 
        $countharilibur = $datalibur->count();

        $filename = 'attendance_report_' . $request->start_date . '_to_' . $request->end_date . '.pdf';
        $pdf = FacadePdf::loadView('pdf.dve.attendance', [
            'absensi' => $absensi,
            'data' => $data,
            'countworkingday' => $countworkingday,
            'countharilibur' => $countharilibur,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            "title" => "Attendance",
        ]);
        $pdf->setPaper('a4');
        return $pdf->stream($filename);
    }

    public function templateAttendance()
    {
        $file_path = public_path('Template Import/Attendance.xlsx');
        return Response::download($file_path, 'Attendance - (Periode).xlsx');
    }
}
