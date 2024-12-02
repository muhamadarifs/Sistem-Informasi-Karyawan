<?php

namespace App\Http\Controllers;

use App\Models\AnnualLeave;
use App\Models\CertificateForm;
use App\Models\DataBank;
use App\Models\DataChange;
use App\Models\LeavePermit;
use App\Models\MedicalLeave;
use App\Models\Permit;
use App\Models\Sign;
use App\Models\SpecialLeave;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class ApplicationFormController extends Controller
{
    public function viewDataChange()
    {
        $user = Auth::user();
        return view('applicationform.data-change', compact('user'), [
            "title" => "Data Form"
        ]);
    }

    public function storeDataChange(Request $request)
    {
        $validatedData = $request->validate([
            'data_change' => 'required',
            'newdata' => [
                'required',
                function($attribute, $value, $fail) use ($request) {
                    $dataChange = $request->input('data_change');
                    if ($dataChange === 'Telepon') {
                        if (!is_numeric($value)) {
                            $fail('Nomor Telepon harus berupa angka.');
                        }
                    } elseif ($dataChange === 'No-KK') {
                        if (!is_numeric($value)) {
                            $fail('Nomor KK harus berupa angka.');
                        }
                    } elseif ($dataChange === 'Rekening') {
                        if (!is_numeric($value)) {
                            $fail('Nomor Rekening harus berupa angka.');
                        }
                    } elseif ($dataChange === 'Email') {
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $fail('Alamat email anda tidak valid.');
                        }
                    }
                },
            ],
            'pdf_file' => [
                function($attribute, $value, $fail) use ($request) {
                    $dataChange = $request->input('data_change');
                    if (in_array($dataChange, ['No-KK', 'Rekening'])) {
                        if (!$request->hasFile('pdf_file')) {
                            $fail('Silahkan unggah file PDF.');
                            return;
                        }
                        $file = $request->file('pdf_file');
                        if ($file->getClientOriginalExtension() !== 'pdf') {
                            $fail('File yang diunggah harus berupa PDF.');
                        }
                    }
                },
            ],
        ]);

        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $userFolder = Auth::user()->nik . '-' . str_replace(' ', '-', Auth::user()->name);
            $storageDirectory = 'public/pdf/Submission Data Change/' . '/' . $userFolder;
            $timestamp = time();
            $day = date('d', $timestamp);
            $month = date('m', $timestamp);
            $year = date('Y', $timestamp);
            $formattedDate = $day . $month . substr($year, -2);
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalName . ' - ' . $formattedDate . '.' . $file->getClientOriginalExtension();
            $file->storeAs($storageDirectory, $fileName);
            $validatedData['pdf_file'] = $fileName;
        }

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['department'] = Auth::user()->position->department;

        try {
            DataChange::create($validatedData);
            Alert::success('Success', 'Successfully Submitted Form');
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error creating DataChange: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()->withErrors(['error' => 'Gagal mengirim data.'])->withInput();
        }
    }

    public function viewEmployeCertificate()
    {
        $user = Auth::user();
        return view('applicationform.employment-certificate', compact('user'),[
            "title" => "Employment Certificate"
        ]);
    }
    public function storeEmployeCertificate(Request $request)
    {
        $validatedData = $request->validate([
            'keperluan' => 'required',
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['position'] = Auth::user()->position_name;

        CertificateForm::create($validatedData);
        Alert::success('Success', 'Successfully Submitted Employment Certificate');
        return redirect()->back();
    }

    // ANNUAL LEAVE (Cuti Tahunan)
    public function viewCreateAnnual()
    {
        return view('applicationform.cr-annual-leave', [
            "title" => "Annual Leave"
        ]);
    }

    public function storeCreateAnnual(Request $request)
    {
        if (Auth::user()->annualleaves->where('status', 'waiting')->isNotEmpty()) {
            return redirect()->back()->with('error', 'You still have outstanding leave requests.');
        }

        $validatedData = $request->validate([
            'jumlah_hari' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'leave_balance' => 'required',
            'tujuan' => 'required',
            'backoffice_date' => 'required',
            'cuti' => 'required',
            'telp' => 'required',
        ]);

        $validatedData['department'] = Auth::user()->position->department;
        $validatedData['position_name'] = Auth::user()->position->position_name;
        $validatedData['position_code'] = Auth::user()->position->position_code;
        $validatedData['superior_name'] = Auth::user()->position->superior_name;
        $validatedData['superior_code'] = Auth::user()->position->superior_code;
        $existingSign = Sign::where('user_id', Auth::user()->id)->first();

        if (!$existingSign) {
            Alert::error('Gagal', 'You have not entered a signature. Please enter your signature first.');
            return redirect()->route('showProfile');
        }
        $user = Auth::user();

        if ( $user->position->position_code === 'ITD1' && $user->position->superior_code === 'MGT2' ||   // IT Dept
             $user->position->position_code === 'ITD2' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'ITD3' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'ITD4' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'HRGA1' && $user->position->superior_code === 'MGT5' ||  // HR Dept
             $user->position->position_code === 'HRGA2' && $user->position->superior_code === 'HRGA1' || // HR Dept
             $user->position->position_code === 'HRGA3' && $user->position->superior_code === 'HRGA1' || // HR Dept
             $user->position->position_code === 'FAC1' && $user->position->superior_code === 'MGT4' ||   // Finance Dept
             $user->position->position_code === 'FAC2' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC3' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC4' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC5' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC6' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC7' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC8' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'MGT6' && $user->position->superior_code === 'MGT4' ||   // Finance Dept
             $user->position->position_code === 'SAS2' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS3' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS4' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS5' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SED1' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'SED2' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'SED3' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'PUR1' && $user->position->superior_code === 'MGT7' ||   // Purchasing
             $user->position->position_code === 'PUR2' && $user->position->superior_code === 'PUR1' ||   // Purchasing
             $user->position->position_code === 'PUR3' && $user->position->superior_code === 'PUR1' ||   // Purchasing
             $user->position->position_code === 'LOG1' && $user->position->superior_code === 'MGT7' ||   // Logistic
             $user->position->position_code === 'LOG2' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'LOG3' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'LOG4' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'WHD1' && $user->position->superior_code === 'MGT7' ||   // Warehouse
             $user->position->position_code === 'WHD2' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'WHD3' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'WHD5' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'ENI1' && $user->position->superior_code === 'MGT9' ||   // Electrical
             $user->position->position_code === 'ENI2' && $user->position->superior_code === 'ENI1' ||   // Electrical
             $user->position->position_code === 'AUT1' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT2' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT3' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT4' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'ENG1' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG2' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG3' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG4' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG5' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG6' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG7' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'QAQC1' && $user->position->superior_code === 'MGT10' || // QAQC
            $user->position->position_code === 'HSE1' && $user->position->superior_code === 'MGT10' ||   // HSE
            $user->position->position_code === 'HSE2' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'HSE3' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'HSE4' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'DVD1' && $user->position->superior_code === 'MGT8' ||    // Damper
            $user->position->position_code === 'DVD2' && $user->position->superior_code === 'DVD1' ||    // Damper
            $user->position->position_code === 'MCN1' && $user->position->superior_code === 'MGT8' ||    // Machining
            $user->position->position_code === 'MCN2' && $user->position->superior_code === 'MCN1' ||    // Machining
            $user->position->position_code === 'MPD1' && $user->position->superior_code === 'MGT8' ||    // MECHANICAL PRODUCTION MANAGER
            $user->position->position_code === 'MPD2' && $user->position->superior_code === 'MGT8' ||    // Production COORDINATOR
            $user->position->position_code === 'MPD3' && $user->position->superior_code === 'MGT8' ||    // Production Administrator
            $user->position->position_code === 'MPD4' && $user->position->superior_code === 'MGT8' ||    // Laser Cutting Engineer
            $user->position->position_code === 'MPD5' && $user->position->superior_code === 'MGT8' ||    // Mechanical, OH and Production Machine Supervisor
            $user->position->position_code === 'MPD15' && $user->position->superior_code === 'MGT8' ||   // Robotic Welding Engineer
            $user->position->position_code === 'MPD16' && $user->position->superior_code === 'MGT8' ||   // Welding Supervisor
            $user->position->position_code === 'MPD20' && $user->position->superior_code === 'MGT8' ||   // Fitting Supervisor
            $user->position->position_code === 'MPD24' && $user->position->superior_code === 'MGT8' ||   // Painting & Blasting Supervisor
            $user->position->position_code === 'MPD28' && $user->position->superior_code === 'MGT8' ||   // Piping Supervisor
            $user->position->position_code === 'MPD32' && $user->position->superior_code === 'MGT8'      // Facilities & Maintenance Supervisor
        )
        {
            $validatedData['hod_approver_1'] = $user->position->superior_code;
        }

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['request_sign'] = $existingSign->sign;

        AnnualLeave::create($validatedData);
        Alert::success('Success', 'Successfully Submitted Form');
        return redirect()->back();
    }

    // Cuti Special
    public function viewSpecialLeave()
    {
        $user = Auth::user();
        return view('applicationform.cr-special-leave', compact('user'), [
            "title" => "Special Leave"
        ]);
    }

    public function storeSpecialLeave(Request $request)
    {
        $validatedData = $request->validate([
            'jumlah_hari' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'backoffice_date' => 'required',
            'cuti' => 'required',
            'telp' => 'required',
            'location' => 'nullable',
            'tujuan' => 'nullable',
        ]);

        // Fill in additional data
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['department'] = Auth::user()->position->department;
        $validatedData['position_name'] = Auth::user()->position->position_name;
        $validatedData['position_code'] = Auth::user()->position->position_code;
        $validatedData['superior_name'] = Auth::user()->position->superior_name;
        $validatedData['superior_code'] = Auth::user()->position->superior_code;

        if ($request->has('cuti')) {
            $request->validate([
                'pdf_file' => 'required|mimes:pdf',
            ]);

            $file = $request->file('pdf_file');
            $selectedCuti = $request->input('cuti');
            $userFolder = Auth::user()->nik . '-' . str_replace('', '-', Auth::user()->name);
            $storageDirectory = 'public/pdf/Cuti Special/' . str_replace(' ', '_', $selectedCuti) . '/' . $userFolder;
            $timestamp = time();
            $day = date('d', $timestamp);
            $month = date('m', $timestamp);
            $year = date('Y', $timestamp);
            $formatedDate = $day . $month . substr($year, -2);
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalName . '-' . $formatedDate . '.' . $file->getClientOriginalExtension();
            $file->storeAs($storageDirectory, $fileName);
            $validatedData['pdf_file'] = $fileName;
        }

        $existingSign = Sign::where('user_id', Auth::user()->id)->first();

        if (!$existingSign) {
            Alert::error('Gagal', 'You have not entered a signature. Please enter your signature first.');
            return redirect()->route('showProfile');
        }

        $user = Auth::user();
        if ( $user->position->position_code === 'ITD1' && $user->position->superior_code === 'MGT2' ||   // IT Dept
             $user->position->position_code === 'ITD2' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'ITD3' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'ITD4' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'HRGA1' && $user->position->superior_code === 'MGT5' ||  // HR Dept
             $user->position->position_code === 'HRGA2' && $user->position->superior_code === 'HRGA1' || // HR Dept
             $user->position->position_code === 'HRGA3' && $user->position->superior_code === 'HRGA1' || // HR Dept
             $user->position->position_code === 'FAC1' && $user->position->superior_code === 'MGT4' ||   // Finance Dept
             $user->position->position_code === 'FAC2' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC3' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC4' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC5' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC6' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC7' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC8' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'MGT6' && $user->position->superior_code === 'MGT4' ||   // Finance Dept
             $user->position->position_code === 'SAS2' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS3' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS4' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS5' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SED1' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'SED2' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'SED3' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'PUR1' && $user->position->superior_code === 'MGT7' ||   // Purchasing
             $user->position->position_code === 'PUR2' && $user->position->superior_code === 'PUR1' ||   // Purchasing
             $user->position->position_code === 'PUR3' && $user->position->superior_code === 'PUR1' ||   // Purchasing
             $user->position->position_code === 'LOG1' && $user->position->superior_code === 'MGT7' ||   // Logistic
             $user->position->position_code === 'LOG2' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'LOG3' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'LOG4' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'WHD1' && $user->position->superior_code === 'MGT7' ||   // Warehouse
             $user->position->position_code === 'WHD2' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'WHD3' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'WHD5' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'ENI1' && $user->position->superior_code === 'MGT9' ||   // Electrical
             $user->position->position_code === 'ENI2' && $user->position->superior_code === 'ENI1' ||   // Electrical
             $user->position->position_code === 'AUT1' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT2' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT3' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT4' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'ENG1' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG2' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG3' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG4' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG5' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG6' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG7' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'QAQC1' && $user->position->superior_code === 'MGT10' || // QAQC
            //  $user->position->position_code === 'QAQC2' && $user->position->superior_code === 'QAQC1' ||  //QAQC
            //  $user->position->position_code === 'QAQC3' && $user->position->superior_code === 'QAQC1' ||  //QAQC
            //  $user->position->position_code === 'QAQC4' && $user->position->superior_code === 'QAQC1' ||  //QAQC
            //  $user->position->position_code === 'QAQC5' && $user->position->superior_code === 'QAQC1'     //QAQC
            $user->position->position_code === 'HSE1' && $user->position->superior_code === 'MGT10' ||   // HSE
            $user->position->position_code === 'HSE2' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'HSE3' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'HSE4' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'DVD1' && $user->position->superior_code === 'MGT8' ||    // Damper
            $user->position->position_code === 'DVD2' && $user->position->superior_code === 'DVD1' ||    // Damper
            $user->position->position_code === 'MCN1' && $user->position->superior_code === 'MGT8' ||    // Machining
            $user->position->position_code === 'MCN2' && $user->position->superior_code === 'MCN1' ||    // Machining
            $user->position->position_code === 'MPD1' && $user->position->superior_code === 'MGT8' ||    // MECHANICAL PRODUCTION MANAGER
            $user->position->position_code === 'MPD2' && $user->position->superior_code === 'MGT8' ||    // Production COORDINATOR
            $user->position->position_code === 'MPD3' && $user->position->superior_code === 'MGT8' ||    // Production Administrator
            $user->position->position_code === 'MPD4' && $user->position->superior_code === 'MGT8' ||    // Laser Cutting Engineer
            $user->position->position_code === 'MPD5' && $user->position->superior_code === 'MGT8' ||    // Mechanical, OH and Production Machine Supervisor
            $user->position->position_code === 'MPD15' && $user->position->superior_code === 'MGT8' ||   // Robotic Welding Engineer
            $user->position->position_code === 'MPD16' && $user->position->superior_code === 'MGT8' ||   // Welding Supervisor
            $user->position->position_code === 'MPD20' && $user->position->superior_code === 'MGT8' ||   // Fitting Supervisor
            $user->position->position_code === 'MPD24' && $user->position->superior_code === 'MGT8' ||   // Painting & Blasting Supervisor
            $user->position->position_code === 'MPD28' && $user->position->superior_code === 'MGT8' ||   // Piping Supervisor
            $user->position->position_code === 'MPD32' && $user->position->superior_code === 'MGT8'      // Facilities & Maintenance Supervisor
        )
        {
            $validatedData['hod_approver_1'] = $user->position->superior_code;
        }
        $validatedData['request_sign'] = $existingSign->sign;

        SpecialLeave::create($validatedData);
        Alert::success('Success', 'Successfully Submitted Form');
        return redirect()->back();
    }

    // Medical Leave (MC)
    public function viewMedical()
    {
        $user = Auth::user();
        return view('applicationform.medical-leave', compact('user'), [
            "title" => "Medical Leave"
        ]);
    }

    public function storeMedical(Request $request)
    {
        if (Auth::user()->medicalleaves->where('status', 'waiting')->isNotEmpty()) {
            return redirect()->back()->with('error', 'You still have outstanding leave requests.');
        }
        $validatedData = $request->validate([
            'jumlah_hari' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'backoffice_date' => 'required',
            'telp' => 'required',
            'cuti' => 'required',
        ]);

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['department'] = Auth::user()->position->department;
        $validatedData['position_name'] = Auth::user()->position->position_name;
        $validatedData['position_code'] = Auth::user()->position->position_code;
        $validatedData['superior_name'] = Auth::user()->position->superior_name;
        $validatedData['superior_code'] = Auth::user()->position->superior_code;

        if ($request->has('cuti')) {
            $request->validate([
                'pdf_file' => 'required|mimes:pdf',
            ]);

            $file = $request->file('pdf_file');
            $userFolder = Auth::user()->nik . '-' . str_replace('', '-', Auth::user()->name);
            $storageDirectory = 'public/pdf/Medical Leave/' . '/' . $userFolder;
            $timestamp = time();
            $day = date('d', $timestamp);
            $month = date('m', $timestamp);
            $year = date('Y', $timestamp);
            $formatedDate = $day . $month . substr($year, -2);
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalName . '-' . $formatedDate . '.' . $file->getClientOriginalExtension();
            $file->storeAs($storageDirectory, $fileName);
            $validatedData['pdf_file'] = $fileName;
        }

        $existingSign = Sign::where('user_id', Auth::user()->id)->first();

        if (!$existingSign) {
            Alert::error('Gagal', 'You have not entered a signature. Please enter your signature first.');
            return redirect()->route('showProfile');
        }
        $user = Auth::user();
        if ( $user->position->position_code === 'ITD1' && $user->position->superior_code === 'MGT2' ||   // IT Dept
             $user->position->position_code === 'ITD2' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'ITD3' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'ITD4' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'HRGA1' && $user->position->superior_code === 'MGT5' ||  // HR Dept
             $user->position->position_code === 'HRGA2' && $user->position->superior_code === 'HRGA1' || // HR Dept
             $user->position->position_code === 'HRGA3' && $user->position->superior_code === 'HRGA1' || // HR Dept
             $user->position->position_code === 'FAC1' && $user->position->superior_code === 'MGT4' ||   // Finance Dept
             $user->position->position_code === 'FAC2' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC3' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC4' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC5' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC6' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC7' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC8' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'MGT6' && $user->position->superior_code === 'MGT4' ||   // Finance Dept
             $user->position->position_code === 'SAS2' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS3' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS4' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS5' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SED1' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'SED2' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'SED3' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'PUR1' && $user->position->superior_code === 'MGT7' ||   // Purchasing
             $user->position->position_code === 'PUR2' && $user->position->superior_code === 'PUR1' ||   // Purchasing
             $user->position->position_code === 'PUR3' && $user->position->superior_code === 'PUR1' ||   // Purchasing
             $user->position->position_code === 'LOG1' && $user->position->superior_code === 'MGT7' ||   // Logistic
             $user->position->position_code === 'LOG2' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'LOG3' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'LOG4' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'WHD1' && $user->position->superior_code === 'MGT7' ||   // Warehouse
             $user->position->position_code === 'WHD2' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'WHD3' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'WHD5' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'ENI1' && $user->position->superior_code === 'MGT9' ||   // Electrical
             $user->position->position_code === 'ENI2' && $user->position->superior_code === 'ENI1' ||   // Electrical
             $user->position->position_code === 'AUT1' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT2' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT3' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT4' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'ENG1' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG2' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG3' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG4' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG5' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG6' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG7' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'QAQC1' && $user->position->superior_code === 'MGT10' || // QAQC
            //  $user->position->position_code === 'QAQC2' && $user->position->superior_code === 'QAQC1' ||  //QAQC
            //  $user->position->position_code === 'QAQC3' && $user->position->superior_code === 'QAQC1' ||  //QAQC
            //  $user->position->position_code === 'QAQC4' && $user->position->superior_code === 'QAQC1' ||  //QAQC
            //  $user->position->position_code === 'QAQC5' && $user->position->superior_code === 'QAQC1'     //QAQC
            $user->position->position_code === 'HSE1' && $user->position->superior_code === 'MGT10' ||   // HSE
            $user->position->position_code === 'HSE2' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'HSE3' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'HSE4' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'DVD1' && $user->position->superior_code === 'MGT8' ||    // Damper
            $user->position->position_code === 'DVD2' && $user->position->superior_code === 'DVD1' ||    // Damper
            $user->position->position_code === 'MCN1' && $user->position->superior_code === 'MGT8' ||    // Machining
            $user->position->position_code === 'MCN2' && $user->position->superior_code === 'MCN1' ||    // Machining
            $user->position->position_code === 'MPD1' && $user->position->superior_code === 'MGT8' ||    // MECHANICAL PRODUCTION MANAGER
            $user->position->position_code === 'MPD2' && $user->position->superior_code === 'MGT8' ||    // Production COORDINATOR
            $user->position->position_code === 'MPD3' && $user->position->superior_code === 'MGT8' ||    // Production Administrator
            $user->position->position_code === 'MPD4' && $user->position->superior_code === 'MGT8' ||    // Laser Cutting Engineer
            $user->position->position_code === 'MPD5' && $user->position->superior_code === 'MGT8' ||    // Mechanical, OH and Production Machine Supervisor
            $user->position->position_code === 'MPD15' && $user->position->superior_code === 'MGT8' ||   // Robotic Welding Engineer
            $user->position->position_code === 'MPD16' && $user->position->superior_code === 'MGT8' ||   // Welding Supervisor
            $user->position->position_code === 'MPD20' && $user->position->superior_code === 'MGT8' ||   // Fitting Supervisor
            $user->position->position_code === 'MPD24' && $user->position->superior_code === 'MGT8' ||   // Painting & Blasting Supervisor
            $user->position->position_code === 'MPD28' && $user->position->superior_code === 'MGT8' ||   // Piping Supervisor
            $user->position->position_code === 'MPD32' && $user->position->superior_code === 'MGT8'      // Facilities & Maintenance Supervisor
        )
        {
            $validatedData['hod_approver_1'] = $user->position->superior_code;
        }
        $validatedData['request_sign'] = $existingSign->sign;

        MedicalLeave::create($validatedData);
        Alert::success('Success', 'Successfully Submitted Form');
        return redirect()->back();
    }

    // permits
    public function viewPermit()
    {
        $user = Auth::user();
        // $currentPeriodPermitCount = $user->permits()->withinCurrentPeriod()->count();
        // $maxPermits = 3;
        $currentDate = Carbon::now();

        if ($currentDate->day >= 21) {
            $startOfPeriod = $currentDate->copy()->day(21)->startOfDay();
            $endOfPeriod = $currentDate->copy()->day(20)->addMonth(1)->endOfDay();
        } else {
            $startOfPeriod = $currentDate->copy()->day(21)->subMonth(1)->startOfDay();
            $endOfPeriod = $currentDate->copy()->day(20)->endOfDay();
        }

        $currentUserId = Auth::id(); // ID user yang sedang login

        $currentPeriodPermitCount = Permit::where('user_id', $currentUserId)
            ->whereBetween('created_at', [$startOfPeriod, $endOfPeriod])
            ->count();

        $maxPermits = 3;

        return view('applicationform.permit', compact('user'), [
            'currentPeriodPermitCount' => $currentPeriodPermitCount,
            'maxPermits' => $maxPermits,
            "title" => "Permit"
        ]);
    }

    public function storePermit(Request $request)
    {
        $validatedData = $request->validate([
            'unpaid' => 'nullable',
            'datang_lambat' => 'nullable',
            'pulang_cepat' => 'nullable',
            'telp' => 'required|numeric',
        ]);

        $user = Auth::user();
        $currentPeriodPermitCount = Permit::where('user_id', $user->id)
            ->withinCurrentPeriod()
            ->count();

        if ($currentPeriodPermitCount >= 3) {
            return redirect()->back()->withErrors(['You have applied for a maximum of 3 permits for the current period.']);
        }

        if($request->has('permit') && $request->input('permit') == 'Unpaid Leave'){
            $request->validate([
                'jumlah_hari' => 'required|numeric',
                'from_date' => 'required|date',
                'to_date' => 'required|date',
                'backoffice_date' => 'required|date',
                'tujuan' => 'required',
            ]);
            $validatedData['permit'] = $request->input('permit');
            $validatedData['jumlah_hari'] = $request->input('jumlah_hari');
            $validatedData['from_date'] = $request->input('from_date');
            $validatedData['to_date'] = $request->input('to_date');
            $validatedData['backoffice_date'] = $request->input('backoffice_date');
            $validatedData['tujuan'] = $request->input('tujuan');
        }

        if($request->has('permit') && $request->input('permit') == 'Datang Terlambat'){
            $request->validate([
                'ket_lambat' => 'required',
                'tanggal_datang_lambat' => 'required|date',
                'jam_datang_lambat' => 'required|date_format:H:i',
            ]);
            $validatedData['permit'] = $request->input('permit');
            $validatedData['ket_lambat'] = $request->input('ket_lambat');
            $validatedData['tanggal_datang_lambat'] = $request->input('tanggal_datang_lambat');
            $validatedData['jam_datang_lambat'] = $request->input('jam_datang_lambat');
        }

        if($request->has('permit') && $request->input('permit') == 'Pulang Cepat'){
            $request->validate([
                'ket_cepat' => 'required',
                'tanggal_pulang_cepat' => 'required|date',
                'jam_pulang_cepat' => 'required|date_format:H:i',
            ]);
            $validatedData['permit'] = $request->input('permit');
            $validatedData['ket_cepat'] = $request->input('ket_cepat');
            $validatedData['tanggal_pulang_cepat'] = $request->input('tanggal_pulang_cepat');
            $validatedData['jam_pulang_cepat'] = $request->input('jam_pulang_cepat');
        }

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['department'] = Auth::user()->position->department;
        $validatedData['position_name'] = Auth::user()->position->position_name;
        $validatedData['position_code'] = Auth::user()->position->position_code;
        $validatedData['superior_name'] = Auth::user()->position->superior_name;
        $validatedData['superior_code'] = Auth::user()->position->superior_code;
        $existingSign = Sign::where('user_id', Auth::user()->id)->first();

        if (!$existingSign) {
            Alert::error('Failed', 'You have not entered a signature. Please enter your signature first.');
            return redirect()->route('showProfile');
        }

        $user = Auth::user();
        if ( $user->position->position_code === 'ITD1' && $user->position->superior_code === 'MGT2' ||   // IT Dept
             $user->position->position_code === 'ITD2' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'ITD3' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'ITD4' && $user->position->superior_code === 'ITD1' ||   // IT Dept
             $user->position->position_code === 'HRGA1' && $user->position->superior_code === 'MGT5' ||  // HR Dept
             $user->position->position_code === 'HRGA2' && $user->position->superior_code === 'HRGA1' || // HR Dept
             $user->position->position_code === 'HRGA3' && $user->position->superior_code === 'HRGA1' || // HR Dept
             $user->position->position_code === 'FAC1' && $user->position->superior_code === 'MGT4' ||   // Finance Dept
             $user->position->position_code === 'FAC2' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC3' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC4' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC5' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC6' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC7' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'FAC8' && $user->position->superior_code === 'FAC1' ||   // Finance Dept
             $user->position->position_code === 'MGT6' && $user->position->superior_code === 'MGT4' ||   // Finance Dept
             $user->position->position_code === 'SAS2' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS3' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS4' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SAS5' && $user->position->superior_code === 'MGT6' ||   // Sales
             $user->position->position_code === 'SED1' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'SED2' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'SED3' && $user->position->superior_code === 'MGT6' ||   // Service Engineer
             $user->position->position_code === 'PUR1' && $user->position->superior_code === 'MGT7' ||   // Purchasing
             $user->position->position_code === 'PUR2' && $user->position->superior_code === 'PUR1' ||   // Purchasing
             $user->position->position_code === 'PUR3' && $user->position->superior_code === 'PUR1' ||   // Purchasing
             $user->position->position_code === 'LOG1' && $user->position->superior_code === 'MGT7' ||   // Logistic
             $user->position->position_code === 'LOG2' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'LOG3' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'LOG4' && $user->position->superior_code === 'LOG1' ||   // Logistic
             $user->position->position_code === 'WHD1' && $user->position->superior_code === 'MGT7' ||   // Warehouse
             $user->position->position_code === 'WHD2' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'WHD3' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'WHD5' && $user->position->superior_code === 'WHD1' ||   // Warehouse
             $user->position->position_code === 'ENI1' && $user->position->superior_code === 'MGT9' ||   // Electrical
             $user->position->position_code === 'ENI2' && $user->position->superior_code === 'ENI1' ||   // Electrical
             $user->position->position_code === 'AUT1' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT2' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT3' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'AUT4' && $user->position->superior_code === 'MGT9' ||   // Automation
             $user->position->position_code === 'ENG1' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG2' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG3' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG4' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG5' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG6' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'ENG7' && $user->position->superior_code === 'MGT3' ||   // Technical Support
             $user->position->position_code === 'QAQC1' && $user->position->superior_code === 'MGT10' || // QAQC
            $user->position->position_code === 'HSE1' && $user->position->superior_code === 'MGT10' ||   // HSE
            $user->position->position_code === 'HSE2' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'HSE3' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'HSE4' && $user->position->superior_code === 'HSE1' ||    // HSE
            $user->position->position_code === 'DVD1' && $user->position->superior_code === 'MGT8' ||    // Damper
            $user->position->position_code === 'DVD2' && $user->position->superior_code === 'DVD1' ||    // Damper
            $user->position->position_code === 'MCN1' && $user->position->superior_code === 'MGT8' ||    // Machining
            $user->position->position_code === 'MCN2' && $user->position->superior_code === 'MCN1' ||    // Machining
            $user->position->position_code === 'MPD1' && $user->position->superior_code === 'MGT8' ||    // MECHANICAL PRODUCTION MANAGER
            $user->position->position_code === 'MPD2' && $user->position->superior_code === 'MGT8' ||    // Production COORDINATOR
            $user->position->position_code === 'MPD3' && $user->position->superior_code === 'MGT8' ||    // Production Administrator
            $user->position->position_code === 'MPD4' && $user->position->superior_code === 'MGT8' ||    // Laser Cutting Engineer
            $user->position->position_code === 'MPD5' && $user->position->superior_code === 'MGT8' ||    // Mechanical, OH and Production Machine Supervisor
            $user->position->position_code === 'MPD15' && $user->position->superior_code === 'MGT8' ||   // Robotic Welding Engineer
            $user->position->position_code === 'MPD16' && $user->position->superior_code === 'MGT8' ||   // Welding Supervisor
            $user->position->position_code === 'MPD20' && $user->position->superior_code === 'MGT8' ||   // Fitting Supervisor
            $user->position->position_code === 'MPD24' && $user->position->superior_code === 'MGT8' ||   // Painting & Blasting Supervisor
            $user->position->position_code === 'MPD28' && $user->position->superior_code === 'MGT8' ||   // Piping Supervisor
            $user->position->position_code === 'MPD32' && $user->position->superior_code === 'MGT8'      // Facilities & Maintenance Supervisor
        )
        {
            $validatedData['hod_approver_1'] = $user->position->superior_code;
        }
        $validatedData['request_sign'] = $existingSign->sign;

        Permit::create($validatedData);
        Alert::success('Success', 'Successfully Submitted Form');
        return redirect()->back();
    }
}
