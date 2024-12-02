<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use App\Models\CertificateForm;
use App\Models\Sign;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Mgt5Controller extends Controller
{
    public function indexCertificate(){
        $certificatemgt5 = CertificateForm::with('user')
                    ->orderBy('created_at', 'desc')->get();
    return view('reviewpage.pmgt5-certificateemployee',[
            'certificatemgt5' => $certificatemgt5,
            'title' => 'Certificate Form Review'
        ]);
    }

    public function approveCreate($id){
        try {
            $certificate = CertificateForm::findOrFail($id);

            $existingSign = Sign::where('user_id', Auth::user()->id)->first();

            if (!$existingSign) {
                Alert::error('Error', 'Failed. You have not entered a signature. Please enter your signature first.');
                return redirect()->route('showProfile');
            }

            $certificate->create_sign = $existingSign->sign;
            $certificate->create_on = Carbon::now();
            $certificate->create_name = Auth::user()->name;
            $certificate->create_position = Auth::user()->position_name;
            $certificate->save();

            Alert::success('Success', 'Success approve certificate employee');
            return redirect()->route('indexmgt5.pagecertificate');
        } catch (\Exception $e) {
            Alert::error('Error', 'Review Failed. There is an error : ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
