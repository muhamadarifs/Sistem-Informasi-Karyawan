<?php

namespace App\Http\Controllers;

use App\Models\CompanyRegDve;
use App\Models\CompanyRegFM;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class PPController extends Controller
{
    public function index(){
        $PPFM = CompanyRegFM::latestOrder()->get();
        $PPDVE = CompanyRegDve::latestOrder()->get();

        return view('tools.peraturanperusahaan',[
            'PPFM' => $PPFM,
            'PPDVE' => $PPDVE,
            'title' => 'Peraturan Perusahaan',
        ]);
    }

    public function storePPDVE(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'companyreg_dve' => 'required|mimes:pdf',
            ]);

                $now = Carbon::now('Asia/Jakarta');

                $validatedData['tanggal'] = $now->toDateString();
                $validatedData['jam'] = $now->toTimeString();

            if ($request->hasFile('companyreg_dve')) {
                $file = $request->file('companyreg_dve');

                $timestamp = time();
                $day = date('d', $timestamp);
                $month = date('m', $timestamp);
                $year = date('Y', $timestamp);

                $formattedDate = $day . $month . substr($year, -2);
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalName . '-' . $formattedDate . '.' . $file->getClientOriginalExtension();

                // Simpan file PDF ke dalam folder penyimpanan publik
                $file->storeAs('public/pdf/Company Regulation DVE/'. $fileName);
                $validatedData['companyreg_dve'] = $fileName;

                CompanyRegDve::create($validatedData);
                Alert::success('Success', 'File uploaded successfully');
                return redirect()->back();
            }else {
                throw new \Exception('File not found.');
            }
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Upload File: ' . $e->getMessage())->persistent(true);
            return redirect()->back()->withInput();
        }
    }

    public function storePPFM(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'companyreg_fm' => 'required|mimes:pdf',
            ]);

                $now = Carbon::now('Asia/Jakarta');

                $validatedData['tanggal'] = $now->toDateString();
                $validatedData['jam'] = $now->toTimeString();

            if ($request->hasFile('companyreg_fm')) {
                $file = $request->file('companyreg_fm');

                $timestamp = time();
                $day = date('d', $timestamp);
                $month = date('m', $timestamp);
                $year = date('Y', $timestamp);

                $formattedDate = $day . $month . substr($year, -2);
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalName . '-' . $formattedDate . '.' . $file->getClientOriginalExtension();

                $file->storeAs('public/pdf/Company Regulation FM/'. $fileName);
                $validatedData['companyreg_fm'] = $fileName;

                CompanyRegFM::create($validatedData);
                Alert::success('success', 'File uploaded successfully');
                return redirect()->back();
            }else {
                throw new \Exception('File not found.');
            }

        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Upload File: ' . $e->getMessage())->persistent(true);
            return redirect()->back()->withInput();
        }
    }

    public function destroyDVE($id){
        try {
            $PPDVE = CompanyRegDve::findOrFail($id);
            $fileDVE = $PPDVE->companyreg_dve;
            $PPDVE->delete();

            if (!empty($fileDVE)) {
                try {
                    Storage::delete('public/pdf/Company Regulation DVE/' . $fileDVE);
                    Alert::success('Success', 'Successfully deleted data company regulation DVE.');
                } catch (\Exception $e) {
                    Alert::warning('Warning', 'Data has been deleted but failed to delete the associated file.');
                }
            }

            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Delete Data: ' . $e->getMessage())->persistent(true);
            return redirect()->back();
        }
    }

    public function destroyFM($id){
        try {
            $PPFM = CompanyRegFM::findOrFail($id);
            $fileFM = $PPFM->companyreg_fm;
            $PPFM->delete();

            if (!empty($filefileFM)) {
                try {
                    Storage::delete('public/pdf/Company Regulation FM/' . $fileFM);
                    Alert::success('Success', 'Successfully deleted data company regulation FM.');
                } catch (\Throwable $th) {
                    Alert::warning('Warning', 'Data has been deleted but failed to delete the associated file.');
                }
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Delete Data: ' . $e->getMessage())->persistent(true);
            return redirect()->back();
        }
    }
}
