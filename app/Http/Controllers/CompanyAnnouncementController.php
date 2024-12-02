<?php

namespace App\Http\Controllers;

use App\Models\CompanyAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class CompanyAnnouncementController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data1 = CompanyAnnouncement::orderBy('created_at', 'desc')->get();
        return view('tools.create-company-announc', [
            'user' => $user,
            'data1' => $data1,
            "title" => "Company Announcement"
        ]);
    }

    public function store(Request $request){
        try {
            $validatedData = $request->validate([
                'author' => 'required',
                'title' => 'required',
                'files' => 'required|mimes:pdf',
            ]);

            $now = Carbon::now('Asia/Jakarta');

            $validatedData['date'] = $now->toDateString();
            $validatedData['jam'] = $now->toTimeString();

            if ($request->hasFile('files')) {
                $file = $request->file('files');

                $timestamp = time();
                $day = date('d', $timestamp);
                $month = date('m', $timestamp);
                $year = date('Y', $timestamp);

                $formattedDate = $day . $month . substr($year, -2);
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalName . '-' . $formattedDate . '.' . $file->getClientOriginalExtension();

                $file->storeAs('public/pdf/Company Announcement/'. $fileName);
                $validatedData['files'] = $fileName;

                CompanyAnnouncement::create($validatedData);
                Alert::success('Success', 'Successfully Added Data.');
                return redirect()->back();
            } else {
               throw new \Exception('File not found.');
            }
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Add Data: ' . $e->getMessage())->persistent(true);
            return redirect()->back()->withInput();
        }
    }

    public function viewDetails($id)
    {
        $datas = CompanyAnnouncement::find($id);
        if (!$datas) {
            return response()->json(['error' => 'Company Announcement not found'], 404);
        }

        $filename = $datas->files;
        $directory = 'public/pdf/Company Announcement/';
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

    public function destroy($id){
        try {
            $companyannouncement = CompanyAnnouncement::findOrFail($id);
            $pdfFileName = $companyannouncement->files;
            $companyannouncement->delete();

            if (!empty($pdfFileName)) {
                try {
                    Storage::delete('public/pdf/Company Announcement/' . $pdfFileName);
                    Alert::success('Success', 'Data has been successfully deleted');
                } catch (\Exception $e) {
                    Alert::warning('Warning', 'Data has been deleted but failed to delete the associated file.');
                }
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to delete data : ' . $e->getMessage())->persistent(true);
            return redirect()->back();
        }
    }
}
