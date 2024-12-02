<?php

namespace App\Http\Controllers;

use App\Models\AnnualLeave;
use App\Models\CertificateForm;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\Models\CompanyRegulation;
use App\Models\CompanyAnnouncement;
use App\Models\CompanyRegDve;
use App\Models\CompanyRegFM;
use App\Models\CutiSpecial;
use App\Models\MedicalLeave;
use App\Models\Permit;
use App\Models\SpecialLeave;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class MyinfoController extends Controller
{
    // View Leave List {My Info}
    public function viewLeaveList(){
        $user = Auth::user();
        $leaveList = AnnualLeave::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $medicalList = MedicalLeave::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $specialleave = SpecialLeave::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $permit = Permit::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('myinfo.annual-leave-list', compact('user', 'leaveList', 'medicalList', 'specialleave', 'permit'),[
            "title" => "Record My Leave"
        ]);
    }

    // View Details Leave List {Extends} - ini untuk contoh terlebih dahulu
    public function viewAnnualLeaveFormFM($id){
        $user = Auth::user();
        $leave = AnnualLeave::find($id);
        $pdf = Pdf::loadView('pdf.outputform.annualleavefm', [
            "title" => "Annual Leave Form",
            'user' => $user,
            'leave' => $leave
        ])->setPaper('A4', 'potrait');
        $pdf->setOptions(['Nunito' => 'sans-serif']);
        $userName = $user->name;
        $fileName = 'Form Leave ' . $userName . '.pdf';
        return $pdf->stream($fileName);
    }
    public function viewAnnualLeaveFormDVE($id){
        $user = Auth::user();
        $leave = AnnualLeave::find($id);
        $pdf = Pdf::loadView('pdf.outputform.annualleavedve', [
            "title" => "Annual Leave Form",
            'user' => $user,
            'leave' => $leave
        ])->setPaper('A4', 'potrait');
        $pdf->setOptions(['Nunito' => 'sans-serif']);
        $userName = $user->name;
        $fileName = 'Form Leave ' . $userName . '.pdf';
        return $pdf->stream($fileName);
    }

    // View PDF Medical Leave (Output Form)
    public function pdfmedicalLeaveFormFM($id){
        $user = Auth::user();
        $leave = MedicalLeave::find($id);
        $pdf = Pdf::loadView('pdf.outputform.medicalleavefm', [
            "title" => "Leave Form",
            'user' => $user,
            'leave' => $leave
        ])->setPaper('A4', 'potrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $userName = $user->name;
        $fileName = 'Form Leave ' . $userName . '.pdf';
        return $pdf->stream($fileName);
    }
    public function pdfmedicalLeaveFormDVE($id){
        $user = Auth::user();
        $leave = MedicalLeave::find($id);
        $pdf = Pdf::loadView('pdf.outputform.medicalleavedve', [
            "title" => "Leave Form",
            'user' => $user,
            'leave' => $leave
        ])->setPaper('A4', 'potrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $userName = $user->name;
        $fileName = 'Form Leave ' . $userName . '.pdf';
        return $pdf->stream($fileName);
    }

    public function viewPdfmedical($id)
    {
        $medicalLeave = MedicalLeave::findOrFail($id);
        $filePath = 'public/pdf/Medical Leave/' . Auth::user()->nik . '-' . str_replace(' ', ' ', Auth::user()->name) . '/' . $medicalLeave->pdf_file;

        if (Storage::exists($filePath)) {
            return response()->file(storage_path('app/' . $filePath));
        } else {
            abort(404, 'File not found.');
        }
    }
    public function viewPdfspecial($id)
    {
        $specialleave = SpecialLeave::findOrFail($id);
        $filePath = 'public/pdf/Cuti Special/' . str_replace(' ', '_', $specialleave->cuti) . '/' . Auth::user()->nik . '-' . str_replace(' ', ' ', Auth::user()->name) . '/' . $specialleave->pdf_file;
        if (Storage::exists($filePath)) {
            return response()->file(storage_path('app/' . $filePath));
        } else {
            abort(404, 'File not found.');
        }
    }

    // View PDF Special Leave (Output Form)
    public function viewspecialLeaveFormFM($id){
        $user = Auth::user();
        $leave = SpecialLeave::find($id);
        $pdf = Pdf::loadView('pdf.outputform.specialleavefm', [
            "title" => "Leave Form",
            'user' => $user,
            'leave' => $leave
        ])->setPaper('A4', 'potrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $userName = $user->name;
        $fileName = 'Form Leave ' . $userName . '.pdf';
        return $pdf->stream($fileName);
    }

    public function viewspecialLeaveFormDVE($id){
        $user = Auth::user();
        $leave = SpecialLeave::find($id);
        $pdf = Pdf::loadView('pdf.outputform.specialleavedve', [
            "title" => "Leave Form",
            'user' => $user,
            'leave' => $leave
        ])->setPaper('A4', 'potrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $userName = $user->name;
        $fileName = 'Form Leave ' . $userName . '.pdf';
        return $pdf->stream($fileName);
    }
    // View PDF Special Leave (Output Form)
    public function viewspermitLeaveFormFM($id){
        $user = Auth::user();
        $leave = Permit::find($id);
        $pdf = Pdf::loadView('pdf.outputform.permitsfm', [
            "title" => "Permit Form",
            'user' => $user,
            'leave' => $leave
        ])->setPaper('A4', 'potrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $userName = $user->name;
        $fileName = 'Form Permit ' . $userName . '.pdf';
        return $pdf->stream($fileName);
    }

    public function viewspermitLeaveFormDVE($id){
        $user = Auth::user();
        $leave = Permit::find($id);
        $pdf = Pdf::loadView('pdf.outputform.permitsdve', [
            "title" => "Permit Form",
            'user' => $user,
            'leave' => $leave
        ])->setPaper('A4', 'potrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $userName = $user->name;
        $fileName = 'Form Leave ' . $userName . '.pdf';
        return $pdf->stream($fileName);
    }

    public function viewCompany()
    {
        $user = Auth::user();
        $companyreg_fm = CompanyRegFM::latestOrder()->get();
        // dd($companyreg_fm);
        $companyreg_dve = CompanyRegDve::latestOrder()->get();
        return view('myinfo.company-regulation',[
            'companyreg_fm' => $companyreg_fm,
            'companyreg_dve' => $companyreg_dve,
            'user' => $user,
            "title" => "Company Regulation"
        ]);
    }

    // Download Company Regulation FM
    public function downloadCompanyRegFM()
    {
        $directory = 'public/pdf/Company Regulation FM';
        $files = Storage::files($directory);

        if (!empty($files)) {
            usort($files, function ($a, $b) {
                return filemtime(Storage::path($b)) - filemtime(Storage::path($a));
            });
            $latestFile = reset($files);
            return Storage::download($latestFile);
        }
        return "Tidak ada file yang dapat diunduh.";
    }

    // view Company Regulation FM
    public function viewCompanyFM($id)
    {
        $datas = CompanyRegFM::find($id);
        if (!$datas) {
            return response()->json(['error' => 'Company Regulation not found'], 404);
        }
        $filename = $datas->companyreg_fm;
        $directory = 'public/pdf/Company Regulation FM/';

        $filePath = $directory .  $filename;

        if (Storage::exists($filePath)) {
            return response()->file(storage_path("app/{$filePath}"), [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"',
            ]);
        }else {
            return response()->json(['error' => 'PDF file not found'], 404);
        }

    }

    // Download Company Regulation DVE
    public function downloadCompanyRegDve()
    {
        $directory = 'public/pdf/Company Regulation DVE';
        // Dapatkan daftar file di direktori
        $files = Storage::files($directory);

        if (!empty($files)) {
            // Urutkan file berdasarkan (timestamp) terbaru
            usort($files, function ($a, $b) {
                return filemtime(Storage::path($b)) - filemtime(Storage::path($a));
            });
            $latestFile = reset($files);
            return Storage::download($latestFile);
        }

        return "Tidak ada file yang dapat diunduh.";
    }

    // View Company Regulation DVE
    public function viewCompanyDVE($id)
    {
        $datas = CompanyRegDve::find($id);
        if (!$datas) {
            return response()->json(['error' => 'Company Regulation not found'], 404);
        }
        $filename = $datas->companyreg_dve;
        $directory = 'public/pdf/Company Regulation DVE/';

        $filePath = $directory .  $filename;

        if (Storage::exists($filePath)) {
            return response()->file(storage_path("app/{$filePath}"), [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"',
            ]);
        }else {
            return response()->json(['error' => 'PDF file not found'], 404);
        }

    }

    // View Internal Memo
    public function viewInternalmemo()
    {
        $user = Auth::user();
        $data = CompanyAnnouncement::latestOrder()->get();
        return view('myinfo.inmemo-announc',[
            'user' => $user,
            'data' => $data,
            "title" => "Internal Memo Announcement"
        ]);
    }

    public function pdfCertificateForm($id){
        $user = Auth::user();
        $certifform = CertificateForm::find($id);
        $pdf = Pdf::loadView('pdf.outputform.certificateemployee', [
            "title" => "Certificate Form",
            'user' => $user,
            'certifform' => $certifform
        ])->setPaper('A4', 'potrait');

        $pdf->setOptions([
            'defaultFont' => 'sans-serif',
            'title' => 'Certificate Form for ' . $user->name
        ]);

        $userName = $user->name;
        $fileName = 'Form Certificate ' . $userName . '.pdf';
        return $pdf->stream($fileName);
    }


}
