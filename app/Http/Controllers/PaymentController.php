<?php
namespace App\Http\Controllers;

ini_set('memory_limit', '-1');
use App\Exports\PaySlipExport;
use App\Exports\PayslipTemplateExport;
use App\Imports\PayslipImport;
use App\Models\Payslip;
use App\Models\QrCodePayslips;
use App\Models\QrPayslip;
use App\Models\TesPayslip;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function indexPay()
    {
        $availablePeriods = Payslip::select('periode')
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->distinct()
                            ->pluck('periode');
        $availableDownload = Payslip::select('periode')
                            ->orderBy('created_at', 'desc')
                            ->distinct()
                            ->pluck('periode');
        $currentYear = Carbon::now()->year;
        $user = Auth::user();

        return view('myinfo.paysalary',[
            'availablePeriods' => $availablePeriods,
            'availableDownload' => $availableDownload,
            'selectedPeriode' => $availablePeriods->first(),
            'currentYear' => $currentYear,
            'data' => Payslip::where('periode', $availablePeriods->first())
                ->where('user_id', $user->id)
                ->first(),
            "title" => "Payslip",
        ]);
    }

    public function generatePDFfm(Request $request)
    {
        $selectedPeriode = $request->input('periode');
        $user = Auth::user();
        $data = Payslip::where('periode', $selectedPeriode)
        ->where('user_id', $user->id)
        ->first();

        $currentYear = Carbon::now()->year;

        $pdf = Pdf::loadView('pdf.payslip_fm_pdf', [
            "title" => "Payslip Employee",
            'user' => $user,
            'data' => $data,
            'selectedPeriode' => $selectedPeriode,
            'currentYear' => $currentYear
        ])->setOptions(['defaultFont' => 'Courier New']);
        $pdf->setPaper('A4', 'potrait');
        $fileName = 'payslip_' . $selectedPeriode . '.pdf';
        return $pdf->stream($fileName);
    }

    public function generatePDFdve(Request $request)
    {
        // set_time_limit(0);
        // ini_set('memory_limit', '-1');
        $selectedPeriode = $request->input('periode');
        $user = Auth::user();
        $data = Payslip::where('periode', $selectedPeriode)
        ->where('user_id', $user->id)
        ->first();

        $currentYear = Carbon::now()->year;

        $pdf = Pdf::loadView('pdf.payslip_dve_pdf', [
            "title" => "Pay Slip",
            'user' => $user,
            'data' => $data,
            'selectedPeriode' => $selectedPeriode,
            'currentYear' => $currentYear
        ])->setOptions(['defaultFont' => 'Courier New']);
        $pdf->setPaper('A4', 'potrait');
        $fileName = 'payslip_' . $selectedPeriode . '.pdf';
        return $pdf->stream($fileName);
    }

    public function exportPayslip()
    {
        return Excel::download(new PaySlipExport, 'Payslip Karyawan.xlsx');
    }

    public function importPayslip(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        try {
            $file = $request->file('file');
            Excel::import(new PayslipImport, $file);
            Alert::success('Success', 'File Imported Successfully');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to import data: '.$e->getMessage());
        }

        return redirect()->back();
    }

    public function templatePayslip()
    {
        $file_path = public_path('Template Import/Payslip.xlsx');
        return Response::download($file_path, 'Payslip - (Periode).xlsx');
    }

}
