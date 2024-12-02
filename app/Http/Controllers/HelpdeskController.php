<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    public function index(){
        return view('helpdesk.index', [
            'title' => 'Index Page',
        ]);
    }

    public function changepass(){
        return view('helpdesk.changepassword',[
            'title' => 'Change Password',
            'headercontent' => 'How to Change Password ?',
        ]);
    }

    public function forgetpass(){
        return view('helpdesk.forgetpass',[
            'title' => 'Forget Password',
            'headercontent' => 'What If I Forget My Password ?',
        ]);
    }

    public function uploadsignature(){
        return view('helpdesk.uploadsignature',[
            'title' => 'Signature Employee',
            'headercontent' => 'How to Upload a Signature ?',
        ]);
    }

    public function changeprofile(){
        return view('helpdesk.changeprofile',[
            'title' => 'Change Profile',
            'headercontent' => 'How to Change Profile Photo ?',
        ]);
    }

    public function uploadktplink(){
        return view('helpdesk.uploadktplink',[
            'title' => 'Upload Identity Card Link',
            'headercontent' => 'How to Upload Identity Card Link ?',
        ]);
    }

    public function uploadbpjslink(){
        return view('helpdesk.uploadbpjs',[
            'title' => 'Upload BPJS Health Care Link',
            'headercontent' => 'How to Upload BPJS Health Care Link ?',
        ]);
    }

    public function uploadbpjsemployeelink(){
        return view('helpdesk.uploadbpjstk',[
            'title' => 'Upload BPJS Employee Link',
            'headercontent' => 'How to Upload BPJS Employee Link ?',
        ]);
    }

    public function filterattend(){
        return view('helpdesk.myinfo-filterattend',[
            'title' => 'Filter Attendance',
            'headercontent' => 'How to Filter Attendance Report ?',
        ]);
    }

    public function downloadattend(){
        return view('helpdesk.myinfo-downloadattend',[
            'title' => 'Download Attendance',
            'headercontent' => 'How to Download Attendance Report ?',
        ]);
    }

    public function viewdownloadpayslip(){
        return view('helpdesk.myinfo-viewdownloadpayslip',[
            'title' => 'View and Download Payslip',
            'headercontent' => 'How to View or Download Payslip ?',
        ]);
    }
}
