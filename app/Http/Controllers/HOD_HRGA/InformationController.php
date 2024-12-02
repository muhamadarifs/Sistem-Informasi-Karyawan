<?php

namespace App\Http\Controllers\HOD_HRGA;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Position;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index(){
        return view('informationemployee.index',[
            'title' => 'HOD Page',
            'title2' => 'HOD Pages'
        ]);
    }

    public function viewAttendance(){
        $attendance = Absensi::all();
        $position = Position::all();

        return view('informationemployee.viewattendance', [
            'title' => 'View Attendance',
            'attendance' => $attendance,
            'position' => $position
        ]);
    }

    public function viewLeave(){
        return view('informationemployee.viewleaveemployee', [
            'title' => 'View Leave',

        ]);
    }

    public function viewOvertime(){
        return view('informationemployee.viewovertime', [
            'title' => 'View Overtime'
        ]);
    }
}
