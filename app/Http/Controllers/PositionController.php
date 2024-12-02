<?php

namespace App\Http\Controllers;

use App\Exports\PositionExport;
use App\Imports\PositionImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Position;

class PositionController extends Controller
{
    public function index() {
        $position = Position::all();

        return view('tools.positiondata', [
            'position' => $position,
            'title' => 'Position Data',
        ]);
    }
    public function importPosition(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        try{
            $data = $request->file('file');
            Excel::import(new PositionImport, $data);
            Alert::success('Success', 'File Imported Successfully');

        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to import data: '.$e->getMessage());
        }

        return redirect()->back();
    }

    public function exportPosition()
    {
        return Excel::download(new PositionExport, 'position hierarcy.xlsx');
    }


}
