<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Absensi;
use App\Models\CertificateForm;
use App\Models\CompanyAnnouncement;
use App\Models\DataChange;
use App\Models\Sign;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $absensi = Absensi::where('employee_id', $user->employee_id)->get();
        $news = News::orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
        $memoin = CompanyAnnouncement::where('created_at', '>=', Carbon::now()->subWeek())
                    ->orderBy('created_at', 'desc')
                    ->get();
        $sign = Sign::where('user_id', $user->id)->first();
        $title = "Home Page";

        return view('dashboard', compact('absensi', 'news', 'title', 'memoin', 'sign'));
    }

    public function archiveindex(){
        $user = Auth::user();
        $data = CertificateForm::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $changedata = DataChange::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('indexarchive', [
            'title' => 'All Form',
            'data' => $data,
            'changedata' => $changedata
        ]);
    }
}
