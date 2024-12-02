<?php

namespace App\Http\Controllers;

use App\Exports\AttendanceExport;
use App\Imports\AttendanceImport;
use Illuminate\Http\Request;
use App\Models\Absensi;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::all();
        return view('dahsboard', ['absensi' => $absensi]);
    }

    public function indexAdmin(){
        $absensi = Absensi::all();
        return view('tools.absensikaryawan',[
            'absensi' => $absensi,
            'title' => "Absen Karyawan",
        ]);
    }

    public function importData(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        try {
            $data = $request->file('file');
            Excel::import(new AttendanceImport, $data);
            Alert::success('Success', 'Successfully import data');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to import data: '.$e->getMessage());
        }

        return redirect()->back();
    }

    public function exportData()
    {
        return Excel::download(new AttendanceExport, 'Attendance.xlsx');
    }

}
