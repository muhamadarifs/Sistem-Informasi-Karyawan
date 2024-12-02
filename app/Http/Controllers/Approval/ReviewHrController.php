<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use App\Models\AnnualLeave;
use App\Models\CertificateForm;
use App\Models\DataChange;
use App\Models\MedicalLeave;
use App\Models\Permit;
use App\Models\Sign;
use App\Models\SpecialLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewHrController extends Controller
{
    public function index(){
        return view('reviewpage.mainindex',[
            'title' => "Review Form"
        ]);
    }

    public function indexAnnualleave(){
        $reviewHR = AnnualLeave::whereNotNull('approve2_name')
                    ->orWhereNotNull('approve3_name')
                    ->orderBy('created_at', 'desc')->get();
        return view('reviewpage.p-annualleave',[
            'reviewHR' => $reviewHR,
            'title' => 'HR Rewiew Page'
        ]);
    }

    public function indexMedicalleave(){
        $reviewHR = MedicalLeave::whereNotNull('approve2_name')
                    ->orWhereNotNull('approve3_name')
                    ->with('user')
                    ->orderBy('created_at', 'desc')->get();
        return view('reviewpage.p-medicalleave',[
            'reviewHR' => $reviewHR,
            'title' => 'HR Rewiew Page'
        ]);
    }

    public function indexSpecialleave(){
        $reviewHR = SpecialLeave::whereNotNull('approve2_name')
                    ->orWhereNotNull('approve3_name')
                    ->with('user')
                    ->orderBy('created_at', 'desc')->get();
        return view('reviewpage.p-specialleave',[
            'reviewHR' => $reviewHR,
            'title' => 'HR Rewiew Page'
        ]);
    }

    public function indexPermit(){
        $reviewHR = Permit::whereNotNull('approve2_name')
                    ->orWhereNotNull('approve3_name')
                    ->with('user')
                    ->orderBy('created_at', 'desc')->get();
        return view('reviewpage.p-permit',[
            'reviewHR' => $reviewHR,
            'title' => 'HR Rewiew Page'
        ]);
    }

    public function indexCertificate(){
        $reviewHR = CertificateForm::with('user')
                    ->orderBy('created_at', 'desc')->get();

        return view('reviewpage.p-certificateform',[
            'reviewHR' => $reviewHR,
            'title' => 'HR Rewiew Page'
        ]);
    }

    public function formannualLeave($id)
    {
        $leave = AnnualLeave::findOrFail($id);
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();

        return view('reviewpage.review-cutitahunan',[
            'title' => "Review Cuti Tahunan",
            'leave' => $leave,
            'sign' => $sign,
        ]);
    }

    public function annualleaveCheck($id)
    {
        try {
            $leave = AnnualLeave::findOrFail($id);

            $existingSign = Sign::where('user_id', Auth::user()->id)->first();

            if (!$existingSign) {
                Alert::error('Error', 'Failed. You have not entered a signature. Please enter your signature first.');
                return redirect()->route('showProfile');
            }

            $leave->review_name = Auth::user()->position_name;
            $leave->review_sign = $existingSign->sign;
            $leave->review_date = Carbon::now();
            $leave->save();

            Alert::success('Success', 'Document Has Review');
            return redirect()->route('review.annual');
        } catch (\Exception $e) {
            Alert::error('Error', 'Review Failed. There is an error : ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function formmedicalLeave($id)
    {
        $medical = MedicalLeave::findOrFail($id);
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();

        return view('reviewpage.review-cutisakit',[
            'title' => "Review Cuti Tahunan",
            'medical' => $medical,
            'sign' => $sign,
        ]);
    }

    public function medicalleaveCheck($id)
    {
        try {
            $medical = MedicalLeave::findOrFail($id);

            $existingSign = Sign::where('user_id', Auth::user()->id)->first();

            if (!$existingSign) {
                Alert::error('Error', 'Failed. You have not entered a signature. Please enter your signature first.');
                return redirect()->route('showProfile');
            }

            $medical->review_name = Auth::user()->position_name;
            $medical->review_sign = $existingSign->sign;
            $medical->review_date = Carbon::now();
            $medical->save();

            Alert::success('Success', 'Document Has Review');
            return redirect()->route('review.medical');
        } catch (\Exception $e) {
            Alert::error('Error', 'Review Failed. There is an error : ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function formspecialLeave($id)
    {
        $special = SpecialLeave::findOrFail($id);
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();

        return view('reviewpage.review-cutispecial',[
            'title' => "Review Cuti Tahunan",
            'special' => $special,
            'sign' => $sign,
        ]);
    }

    public function specialleaveCheck($id)
    {
        try {
            $special = SpecialLeave::findOrFail($id);

            $existingSign = Sign::where('user_id', Auth::user()->id)->first();

            if (!$existingSign) {
                Alert::error('Error', 'Failed. You have not entered a signature. Please enter your signature first.');
                return redirect()->route('showProfile');
            }

            $special->review_name = Auth::user()->position_name;
            $special->review_sign = $existingSign->sign;
            $special->review_date = Carbon::now();
            $special->save();

            Alert::success('Success', 'Document Has Review');
            return redirect()->route('review.special');
        } catch (\Exception $e) {
            Alert::error('Error', 'Review Failed. There is an error : ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function formpermit($id)
    {
        $permit = Permit::findOrFail($id);
        $user = Auth::user();
        $sign = Sign::where('user_id', $user->id)->first();

        return view('reviewpage.review-permit',[
            'title' => "Review Cuti Tahunan",
            'permit' => $permit,
            'sign' => $sign,
        ]);
    }

    public function PermitCheck($id)
    {
        try {
            $permit = Permit::findOrFail($id);

            $existingSign = Sign::where('user_id', Auth::user()->id)->first();

            if (!$existingSign) {
                Alert::error('Error', 'Failed. You have not entered a signature. Please enter your signature first.');
                return redirect()->route('showProfile');
            }

            $permit->review_name = Auth::user()->position_name;
            $permit->review_sign = $existingSign->sign;
            $permit->review_date = Carbon::now();
            $permit->save();

            Alert::success('Success', 'Document Has Review');
            return redirect()->route('review.permit');
        } catch (\Exception $e) {
            Alert::error('Error', 'Review Failed. There is an error : ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function createLetterNumber(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'form_number' => 'required',
            ]);

            $certificate = CertificateForm::findOrFail($id);
            $certificate->update($validatedData);
            Alert::success('Success', 'Create Number Letter Successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Review Failed. There is an error : ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function CertificateCheck($id)
    {
        try {
            $certificatecheck = CertificateForm::findOrFail($id);

            $certificatecheck->review_position = Auth::user()->position_name;
            $certificatecheck->save();

            Alert::success('Success', 'Certificate Employee Has Send to Employee');
            return redirect()->route('review.certificate');
        } catch (\Exception $e) {
            Alert::error('Error', 'Review Failed. There is an error : ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function Approvedatachange($id)
    {
        try {
            $Data = DataChange::findOrFail($id);

            $Data->status = 'Submission of data changes is approved';
            $Data->save();

            Alert::success('Success', 'Approved');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Approved : ' . $e->getMessage());
            return redirect()->back();
        }
    }
    public function Rejectdatachange($id)
    {
        try {
            $Data = DataChange::findOrFail($id);

            $Data->status = 'Submission of data changes is Rejected';
            $Data->save();

            Alert::success('Success', 'Approved');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Approved : ' . $e->getMessage());
            return redirect()->back();
        }
    }

}
