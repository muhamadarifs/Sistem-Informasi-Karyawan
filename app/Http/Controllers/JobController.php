<?php

namespace App\Http\Controllers;

use App\Models\JobDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index(){
        $user = Auth::user();
        $positionCode = $user->position->position_code;
        $data = JobDescription::where('job_code', $positionCode)->get();
        return view('myinfo.jobdesc', [
            'data' => $data,
            "title" => "Job Description"
        ]);
    }

    public function indexAdmin(){
        $jobdata = JobDescription::all();
        return view('tools.jobdeskripsi', [
            'jobdata' => $jobdata,
            "title" => "Job Description Admin"
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'job_code'=>'required',
            'job_name'=>'required',
            'job_file'=>'required|mimes:pdf',
        ]);

        if ($request->hasFile('job_file')) {
            $file = $request->file('job_file');

            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $directoy = 'public/pdf/Job Description/' . $originalName;
            $fileName = $originalName . '.' . $file->getClientOriginalExtension();
            $file->storeAs($directoy, $fileName);
            $validatedData['job_file'] = $fileName;

            JobDescription::create($validatedData);
            Alert::success('Success', 'Successfully added Job Description data.');
            return redirect()->back();
        }
    }

    public function viewPdfJobDesc($id){
        $jobdesc = JobDescription::find($id);

        if (!$jobdesc) {
            return response()->json(['error' => 'Job description not found'], 404);
        }

        $filename = $jobdesc->job_file;
        $directory = 'public/pdf/Job Description/';

        $fileParts = pathinfo($filename);
        $folderName = $fileParts['filename'];
        $filePath = $directory . $folderName . '/' . $filename;
        if (Storage::exists($filePath)) {
            return response()->file(storage_path("app/{$filePath}"), [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"',
                'Title' => $jobdesc->job_name,
            ]);
        }else {
            return response()->json(['error' => 'PDF file not found'], 404);
        }
    }

    public function edit(Request $request, $id){
        $jobDesc = JobDescription::where('id', $id)->first();
        return view('admin.jobdeskripsi', compact('jobDesc'));
    }

    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'job_code' => 'required',
            'job_name' => 'required',
            'job_file' => 'nullable|mimes:pdf',
        ]);

        $jobDesc = JobDescription::findOrFail($id);

        if ($request->hasFile('job_file')) {
            $file = $request->file('job_file');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $directory = 'public/pdf/Job Description/' . $originalName;
            $fileName = $originalName . '.' . $file->getClientOriginalExtension();
            $file->storeAs($directory, $fileName);
            $validatedData['job_file'] = $originalName . '/' . $fileName;
        }
        $jobDesc->update($validatedData);
        Alert::success('Success', 'Data Updated Successfully.');
        return redirect()->back();
    }

    public function destroy($id){
        try {
            $jobdata = JobDescription::findOrFail($id);
            $pdfFileName = $jobdata->job_file;
            $jobdata->delete();

            if (!empty($pdfFileName)) {
                try {
                    Storage::delete('public/pdf/Job Description/' . $pdfFileName);
                    Alert::success('Success', 'Job Description Data Deleted Successfully.');
                } catch (\Exception $e) {
                    Alert::warning('Warning', 'Data has been deleted but failed to delete the associated file.');
                }
            }

            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Delete Data : ' . $e->getMessage())->persistent(true);
            return redirect()->back();
        }
    }

}
