<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackupController extends Controller
{

    public function submit(Request $request)
    {
        // Validate and process the form data here

        // Example: Validation and saving data
        // You can customize this part according to your application's logic
        $success = true; // Set to true if the submission was successful
        $message = 'Submission was successful';

        // Return a JSON response
        return response()->json(['success' => $success, 'message' => $message]);
    }



    //
    // viewCompanyAnnounc
    // HRD Information System
    public function viewSubmissionList(){
        $user = Auth::user();
        return view('hrd-is.submission-datalist', compact('user'),[
            "title" => "Submission List"
        ]);
    }

    public function viewCreateEmployCertif()
    {
        $user = Auth::user();
        return view('hrd-is.create-employ-certif', compact('user'), [
            "title" => "Employee Certificate"
        ]);
    }

    public function viewGL()
    {
        $user = Auth::user();
        return view('hrd-is.create-gletter', compact('user'), [
            "title" => "Guarantee Letter"
        ]);
    }

    public function viewMR()
    {
        $user = Auth::user();
        return view('hrd-is.create-manpower', compact('user'), [
            "title" => "Manpower Request"
        ]);
    }

    public function viewNE()
    {
        $user = Auth::user();
        return view('hrd-is.create-new-employ', compact('user'), [
            "title" => "New Employee"
        ]);
    }

    public function viewEB()
    {
        $user = Auth::user();
        return view('hrd-is.create-of-employ-blacklist', compact('user'), [
            "title" => "Employee Blacklist"
        ]);
    }

    public function viewEP()
    {
        $user = Auth::user();
        return view('hrd-is.create-employ-promotion', compact('user'), [
            "title" => "Employee Promotion"
        ]);
    }

    public function viewET()
    {
        $user = Auth::user();
        return view('hrd-is.create-of-employ-transfer', compact('user'), [
            "title" => "Employee Transfer"
        ]);
    }

    public function viewJobasign()
    {
        $user = Auth::user();
        return view('hrd-is.create-of-job-assign', compact('user'), [
            "title" => "Job Assign"
        ]);
    }

    public function viewOTRequest()
    {
        $user = Auth::user();
        return view('hrd-is.create-OT-request', compact('user'), [
            "title" => "Overtime Request"
        ]);
    }

    public function viewParkkliring()
    {
        $user = Auth::user();
        return view('hrd-is.create-parkkliring', compact('user'), [
            "title" => "Parkkliring"
        ]);
    }

    public function viewPA()
    {
        $user = Auth::user();
        return view('hrd-is.create-perfom-appraisal', compact('user'), [
            "title" => "Perfomance Aprraisal"
        ]);
    }

    public function viewPromotionLetter()
    {
        $user = Auth::user();
        return view('hrd-is.create-promotion-letter', compact('user'), [
            "title" => "Promotion Letter"
        ]);
    }

    public function viewReferenceLetter()
    {
        $user = Auth::user();
        return view('hrd-is.create-reference-letter', compact('user'), [
            "title" => "Reference Letter"
        ]);
    }

    public function viewSalaryLetter()
    {
        $user = Auth::user();
        return view('hrd-is.create-salary-adjust-letter', compact('user'), [
            "title" => "Salary Adjustment"
        ]);
    }

    public function viewWarningLetter()
    {
        $user = Auth::user();
        return view('hrd-is.create-warning-letter', compact('user'), [
            "title" => "Warning Letter"
        ]);
    }

    public function viewListEmploye()
    {
        $user = Auth::user();
        return view('hrd-is.list-of-employe', compact('user'), [
            "title" => "List Employee"
        ]);
    }

    public function viewListEmployeContract()
    {
        $user = Auth::user();
        return view('hrd-is.list-of-employe-contract', compact('user'), [
            "title" => "Employee Contract"
        ]);
    }

    public function viewListPublicHoliday()
    {
        $user = Auth::user();
        return view('hrd-is.list-of-public-holiday', compact('user'), [
            "title" => "Public Holiday"
        ]);
    }

    public function viewReportEmployeDB()
    {
        $user = Auth::user();
        return view('hrd-is.report-employe-db', compact('user'), [
            "title" => "Report Employee Database"
        ]);
    }

    public function viewReportEB()
    {
        $user = Auth::user();
        return view('hrd-is.report-of-employe-blacklist', compact('user'), [
            "title" => "Report Employee Blacklist"
        ]);
    }

    public function viewReportEP()
    {
        $user = Auth::user();
        return view('hrd-is.report-of-employe-promotion', compact('user'), [
            "title" => "Report Employee Promotion"
        ]);
    }

    public function viewReportSalaryAdjust()
    {
        $user = Auth::user();
        return view('hrd-is.report-of-salary-adjust', compact('user'), [
            "title" => "Report Salary Adjustment"
        ]);
    }

    public function viewReportWarningLetter()
    {
        $user = Auth::user();
        return view('hrd-is.report-of-warning-letter', compact('user'), [
            "title" => "Report Warning Letter"
        ]);
    }

    public function viewSubmissionUnblokEmploy()
    {
        $user = Auth::user();
        return view('hrd-is.submission-of-unblocked-employ', compact('user'), [
            "title" => "Unblocked Employee"
        ]);
    }


    public function viewHRIS()
    {
        $user = Auth::user();
        return view('hris', compact('user'), [
            "title" => "HRIS"
        ]);
    }


}
