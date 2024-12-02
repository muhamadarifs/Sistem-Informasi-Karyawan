<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AnnualleaveController;
use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\Approval\CutiSakitController;
use App\Http\Controllers\Approval\CutiSpecialController;
use App\Http\Controllers\Approval\CutiTahunanController;
use App\Http\Controllers\Approval\Mgt5Controller;
use App\Http\Controllers\Approval\PermitController;
use App\Http\Controllers\Approval\ReviewHrController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CompanyAnnouncementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\HOD_HRGA\InformationController;
use App\Http\Controllers\HrisController;
use App\Http\Controllers\MasteradminController;
use App\Http\Controllers\MyinfoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PPController;
use App\Http\Controllers\ToolsController;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});


Auth::routes();

//------------------------------------------------ LOGIN AND LOGOUT ----------------------------------------------
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('postlogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//--------------------------------------------------- REGISTER ---------------------------------------------------
Route::get('/register', [RegisterController::class, 'index'])->name('auth.page-register');
Route::post('/register', [RegisterController::class, 'store'])->name('postregist');
//------------------------------------------------ FORGOT PASSWORD -----------------------------------------------
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.forgot');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.emails');
//------------------------------------------------ RESET PASSWORD ------------------------------------------------
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.resset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.updates');

Route::group(['middleware' => ['auth', 'hakakses:superadmin,admin,user']], function(){
    // DASHBOARD ROUTE (ALL USER)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/allform', [DashboardController::class, 'archiveindex'])->name('index.archive');

    // NEWS ROUTE (ALL USER)
    Route::get('/news/{id}', [NewsController::class, 'news'])->name('news.singlepage');

    // USER ROUTE (ALL USER)
    Route::get('/profile', [UserController::class, 'showuser'])->name('showProfile');
    Route::get('/profiledetails', [UserController::class, 'detailsProfile'])->name('detailsProfile');
    Route::get('/profile-edit', [UserController::class, 'editProfile'])->name('editProfil');
    Route::get('/changepassword', [UserController::class, 'changePassword'])->name('change.password');
    Route::post('/changepassword', [UserController::class, 'updatePassword'])->name('update.password');
    Route::put('/storelinksbpjshealth', [UserController::class, 'storeLinkBpjs'])->name('store.BPJShealth');
    Route::put('/storelinksbpjsemployee', [UserController::class, 'storeLinkBpjsTK'])->name('store.BPJSemployee');
    Route::put('/storelinksktpfile', [UserController::class, 'storeLinkktp'])->name('store.KtpFile');

    // IMAGE ROUTE USER PROFILE (ALL USER) 'User Profile'
    // Route::post('/upload', [ImageUploadController::class, 'uploadImage'])->name('uploadImage');
    // Route::post('/remove', [ImageUploadController::class, 'removeImage'])->name('removeImage');
    Route::post('/uploadsign', [ImageUploadController::class, 'upSign'])->name('sign.store');

    // JOB DESCRIPTION ROUTE (ALL USER)
    Route::get('/job/{id}/pdf', [JobController::class, 'viewPdfJobDesc'])->name('viewPdfJobDesc');

    // ATTENDANCE ROUTE (ALL USER)
    Route::get('/Attend', [AttendanceController::class, 'index'])->name('attend.report');
    Route::post('/Attend', [AttendanceController::class, 'filter'])->name('attend.filter');
    Route::get('/downloadattend', [AttendanceController::class, 'downloadAttend'])->name('attend.download.fm');
    Route::get('/downloadattenddve', [AttendanceController::class, 'downloadAttendDVE'])->name('attend.download.dve');

    // Annual Leave
    // Route::get('/annual-leave', [AnnualleaveController::class, 'index']);
    // Route::get('/leave-history', [AnnualleaveController::class, 'riwayatSaldoCutiBulanSebelumnya'])->name('riwayatSaldoCutiBulanSebelumnya');
    Route::get('/annual-list', [MyinfoController::class, 'viewLeaveList'])->name('viewLeaveList');

    // FORM OUTPUT CUTI
    Route::get('/annualleave/FM/{id}', [MyinfoController::class, 'viewAnnualLeaveFormFM'])->name('viewAnnualLeaveFormFM');
    Route::get('/annualleave/DVE/{id}', [MyinfoController::class, 'viewAnnualLeaveFormDVE'])->name('viewAnnualLeaveFormDVE');
    Route::get('/specialleave/FM/{id}', [MyinfoController::class, 'viewspecialLeaveFormFM'])->name('viewspecialLeaveFormFM');
    Route::get('/specialleave/DVE/{id}', [MyinfoController::class, 'viewspecialLeaveFormDVE'])->name('viewspecialLeaveFormDVE');
    Route::get('/medicalleave/FM/{id}', [MyinfoController::class, 'pdfmedicalLeaveFormFM'])->name('pdfmedicalleaveFM.Form');
    Route::get('/medicalleave/DVE/{id}', [MyinfoController::class, 'pdfmedicalLeaveFormDVE'])->name('pdfmedicalleaveDVE.Form');
    Route::get('/permits/FM/{id}', [MyinfoController::class, 'viewspermitLeaveFormFM'])->name('pdfpermitsFM.Form');
    Route::get('/permits/DVE/{id}', [MyinfoController::class, 'viewspermitLeaveFormDVE'])->name('pdfpermitsDVE.Form');
    Route::get('/certificate/employee/{id}', [MyinfoController::class, 'pdfCertificateForm'])->name('certificate.Form');
    Route::get('/PDFMedical/{id}', [MyinfoController::class, 'viewPdfmedical'])->name('viewPdfmedical');
    Route::get('/PDFSpecial/{id}', [MyinfoController::class, 'viewPdfspecial'])->name('viewPdfspecial');
    // APPROVE ANNUAL LEAVE
    Route::get('/listannualleave', [CutiTahunanController::class, 'index'])->name('annualleave.index');
    Route::get('/cutitahunan/{id}', [CutiTahunanController::class, 'indexForm'])->name('annualleave.form');
    Route::get('/cutitahunan/details/{id}', [CutiTahunanController::class, 'detailsForm'])->name('annualleave.details');
    Route::post('/approve/{id}/cutitahunan/spv', [CutiTahunanController::class, 'approvespv'])->name('tahunan.approve');
    Route::post('/reject/{id}/cutitahunan/spv', [CutiTahunanController::class, 'rejectspv'])->name('tahunan.reject');
    Route::post('/approve/{id}/cutitahunan/hod', [CutiTahunanController::class, 'approvehod'])->name('tahunan.approvehod');
    Route::post('/reject/{id}/cutitahunan/hod', [CutiTahunanController::class, 'rejecthod'])->name('tahunan.rejecthod');
    Route::post('/approve/{id}/cutitahunan/HR1', [CutiTahunanController::class, 'approveHR1'])->name('tahunan.approveHR1');
    Route::post('/reject/{id}/cutitahunan/HR1', [CutiTahunanController::class, 'rejectHR1'])->name('tahunan.rejectHR1');
    // APPROVE MEDICAL LEAVE
    Route::get('/listmedicalleave', [CutiSakitController::class, 'index'])->name('medicalleave.index');
    Route::get('/listmedicalleave/pdfdoctorcertificate/{id}', [CutiSakitController::class, 'Pdfmedicalcertified'])->name('medicalleave.certificate');
    Route::get('/medicalleave/{id}', [CutiSakitController::class, 'indexForm'])->name('medicalleave.form');
    Route::get('/medicalleave/details/{id}', [CutiSakitController::class, 'detailsForm'])->name('medicalleave.details');
    Route::post('/approve/{id}/medicalleave/spv', [CutiSakitController::class, 'approvespv'])->name('medical.approve');
    Route::post('/reject/{id}/medicalleave/spv', [CutiSakitController::class, 'rejectspv'])->name('medical.reject');
    Route::post('/approve/{id}/medicalleave/hod', [CutiSakitController::class, 'approvehod'])->name('medical.approvehod');
    Route::post('/reject/{id}/medicalleave/hod', [CutiSakitController::class, 'rejecthod'])->name('medical.rejecthod');
    // APPROVE SPECIAL LEAVE
    Route::get('/listspecialleave', [CutiSpecialController::class, 'index'])->name('specialleave.index');
    Route::get('/specialleave/{id}', [CutiSpecialController::class, 'indexForm'])->name('specialleave.form');
    Route::get('/specialleave/details/{id}', [CutiSpecialController::class, 'detailsForm'])->name('specialleave.details');
    Route::post('/approve/{id}/specialleave/spv', [CutiSpecialController::class, 'approvespv'])->name('specialleave.approve');
    Route::post('/reject/{id}/specialleave/spv', [CutiSpecialController::class, 'rejectspv'])->name('specialleave.reject');
    Route::post('/approve/{id}/specialleave/hod', [CutiSpecialController::class, 'approvehod'])->name('specialleave.approvehod');
    Route::post('/reject/{id}/specialleave/hod', [CutiSpecialController::class, 'rejecthod'])->name('specialleave.rejecthod');
    // APPROVE PERMIT
    Route::get('/listpermit', [PermitController::class, 'index'])->name('permit.index');
    Route::get('/permit/{id}', [PermitController::class, 'indexForm'])->name('permit.form');
    Route::get('/permit/unpaid/{id}', [PermitController::class, 'unpaidForm'])->name('permit.unpaid');
    Route::get('/permit/details/{id}', [PermitController::class, 'detailsForm'])->name('permit.details');
    Route::post('/approve/{id}/permit/spv', [PermitController::class, 'approvespv'])->name('permit.approve');
    Route::post('/reject/{id}/permit/spv', [PermitController::class, 'rejectspv'])->name('permit.reject');
    Route::post('/approve/{id}/permit/hod', [PermitController::class, 'approvehod'])->name('permit.approvehod');
    Route::post('/reject/{id}/permit/hod', [PermitController::class, 'rejecthod'])->name('permit.rejecthod');
    Route::post('/approve/{id}/permit/mgt5', [PermitController::class, 'approvemgt5'])->name('permit.approvemgt5');
    Route::post('/reject/{id}/permit/mgt5', [PermitController::class, 'rejectmgt5'])->name('permit.rejectmgt5');
    // REVIEW APPROVAL BY HR (ADMIN)
    Route::get('/reviewformleave', [ReviewHrController::class, 'index'])->name('review.mainindex');
    Route::get('/reviewannualleave', [ReviewHrController::class, 'indexAnnualleave'])->name('review.annual');
    Route::get('/reviewmedicalleave', [ReviewHrController::class, 'indexMedicalleave'])->name('review.medical');
    Route::get('/reviewspecialleave', [ReviewHrController::class, 'indexSpecialleave'])->name('review.special');
    Route::get('/reviewpermit', [ReviewHrController::class, 'indexPermit'])->name('review.permit');
    Route::get('/reviewcertificateemployee', [ReviewHrController::class, 'indexCertificate'])->name('review.certificate');
    Route::get('/review/tahunan/{id}', [ReviewHrController::class, 'formannualLeave'])->name('review.cutitahunan');
    Route::get('/review/medical/{id}', [ReviewHrController::class, 'formmedicalLeave'])->name('review.cutisakit');
    Route::get('/review/special/{id}', [ReviewHrController::class, 'formspecialLeave'])->name('review.cutispecial');
    Route::get('/review/permit/{id}', [ReviewHrController::class, 'formpermit'])->name('review.permitform');
    Route::post('/reviewapproval/annual/{id}', [ReviewHrController::class, 'annualleaveCheck'])->name('annualleave.check');
    Route::post('/reviewapproval/medical/{id}', [ReviewHrController::class, 'medicalleaveCheck'])->name('medicalleave.check');
    Route::post('/reviewapproval/special/{id}', [ReviewHrController::class, 'specialleaveCheck'])->name('specialleave.check');
    Route::post('/reviewapproval/permit/{id}', [ReviewHrController::class, 'PermitCheck'])->name('permit.check');
    Route::post('/reviewapproval/certificateemployee/{id}', [ReviewHrController::class, 'CertificateCheck'])->name('certificate.check');
    Route::put('/certificateemployee/letternumber/{id}', [ReviewHrController::class, 'createLetterNumber'])->name('create.letternumber');
    //MGT5
    Route::get('/pagemgt5/certificateemployee', [Mgt5Controller::class, 'indexCertificate'])->name('indexmgt5.pagecertificate');
    Route::post('/pagemgt5/certificateemployee/approve/{id}', [Mgt5Controller::class, 'approveCreate'])->name('indexmgt5.approve');

    // PAYSLIP
    Route::get('/payslips', [PaymentController::class, 'indexPay'])->name('indexPay');
    Route::get('/downloadpdffm/{id}', [PaymentController::class, 'generatePDFfm'])->name('generatePDFfm');
    Route::get('/downloadpdfdve/{id}', [PaymentController::class, 'generatePDFdve'])->name('generatePDFdve');

    // Jobdesk
    Route::get('/jobdesc', [JobController::class, 'index']);

    //view company regulation
    Route::get('/company-regulation', [MyinfoController::class, 'viewCompany'])->name('viewCompany');

    // Download & view Company regulation
    // Route::get('/download-company-regulationFM', [MyinfoController::class, 'downloadCompanyRegFM'])->name('downloadCompanyRegFM');
    // Route::get('/download-company-regulationDve', [MyinfoController::class, 'downloadCompanyRegDve'])->name('downloadCompanyRegDve');
    Route::get('/Company Regulation Feen Marine/{id}', [MyinfoController::class, 'viewCompanyFM'])->name('viewCompanyFM');
    Route::get('/Company Regulation DVE Marine/{id}', [MyinfoController::class, 'viewCompanyDVE'])->name('viewCompanyDVE');

    //view internal memo and announcement
    Route::get('/inmemo-announ', [MyinfoController::class, 'viewInternalmemo'])->name('viewInternalmemo');
    Route::get('/details/{id}', [CompanyAnnouncementController::class, 'viewDetails'])->name('viewDetails');
    // CALENDAR ROUTE
    Route::get('eventslist', [CalendarController::class, 'listEvent'])->name('events.list');
    Route::resource('events', CalendarController::class);

    //apply employment certificate
    Route::get('/employment-certificate', [ApplicationFormController::class, 'viewEmployeCertificate'])->name('viewEC');
    Route::post('/employment-certificate-store', [ApplicationFormController::class, 'storeEmployeCertificate'])->name('storeEmploycertificate');
    //create annual leave
    Route::get('/cr-annual-leave', [ApplicationFormController::class, 'viewCreateAnnual'])->name('viewCreateAnnual');
    Route::post('/create-annual-leave', [ApplicationFormController::class, 'storeCreateAnnual'])->name('storeCreateAnnual');
    //create special leave
    Route::get('/special-leave', [ApplicationFormController::class, 'viewSpecialLeave'])->name('viewSpecialLeave');
    Route::post('/create-special-leave', [ApplicationFormController::class, 'storeSpecialLeave'])->name('storeSpecialLeave');
    //create maedical leave application
    Route::get('/medical', [ApplicationFormController::class, 'viewMedical'])->name('viewMedical');
    Route::post('/create-medical', [ApplicationFormController::class, 'storeMedical'])->name('storeMedical');
    //create permit application
    Route::get('/permit', [ApplicationFormController::class, 'viewPermit'])->name('viewPermit');
    Route::post('/create-permit', [ApplicationFormController::class, 'storePermit'])->name('storePermit');
    //datachange
    Route::get('/data-changes', [ApplicationFormController::class, 'viewDataChange'])->name('viewDataChange');
    Route::post('/data-store', [ApplicationFormController::class, 'storeDataChange'])->name('storeDataChange');

    Route::get('/hodpages', [InformationController::class, 'index'])->name('hod.index');
    Route::get('/hodpages-attendance', [InformationController::class, 'viewAttendance'])->name('hod.attendance');
    Route::get('/hodpages-leave', [InformationController::class, 'viewLeave'])->name('hod.leave');
    Route::get('/hodpages-overtime', [InformationController::class, 'viewOvertime'])->name('hod.overtime');

    Route::get('/helpdesk', [HelpdeskController::class, 'index'])->name('helpdesk.index');
    Route::get('/helpdesk/changepassword', [HelpdeskController::class, 'changepass'])->name('helpdesk.changepass');
    Route::get('/helpdesk/forgetpassword', [HelpdeskController::class, 'forgetpass'])->name('helpdesk.forgetpass');
    Route::get('/helpdesk/uploadsignature', [HelpdeskController::class, 'uploadsignature'])->name('helpdesk.uploadsignature');
    Route::get('/helpdesk/changeprofile', [HelpdeskController::class, 'changeprofile'])->name('helpdesk.changeprofile');
    Route::get('/helpdesk/uploadktplink', [HelpdeskController::class, 'uploadktplink'])->name('helpdesk.uploadktplink');
    Route::get('/helpdesk/uploadbpjslink', [HelpdeskController::class, 'uploadbpjslink'])->name('helpdesk.uploadbpjslink');
    Route::get('/helpdesk/uploadbpjsemployeelink', [HelpdeskController::class, 'uploadbpjsemployeelink'])->name('helpdesk.uploadbpjsemployeelink');
    Route::get('/helpdesk/filterattend', [HelpdeskController::class, 'filterattend'])->name('helpdesk.filterattend');
    Route::get('/helpdesk/downloadattend', [HelpdeskController::class, 'downloadattend'])->name('helpdesk.downloadattend');
    Route::get('/helpdesk/viewdownloadpayslip', [HelpdeskController::class, 'viewdownloadpayslip'])->name('helpdesk.viewdownloadpayslip');
});
Route::group(['middleware' => ['auth', 'hakakses:superadmin,admin']], function(){
    // COMPANY ANNOUNCEMENT ROUTE (SUPER ADMIN & ADMIN)
    Route::get('/create-company-announcement', [CompanyAnnouncementController::class, 'index'])->name('CA.index');
    Route::post('/store-company-announcement', [CompanyAnnouncementController::class, 'store'])->name('CA.store');
    Route::post('/deletecompanyannouncement/{id}', [CompanyAnnouncementController::class, 'destroy'])->name('CA.destroy');

    Route::post('/approve/{id}/datachange', [ReviewHrController::class, 'Approvedatachange'])->name('datachange.approve');
    Route::post('/reject/{id}/datachange', [ReviewHrController::class, 'Rejectdatachange'])->name('datachange.reject');



    // MASTER ADMIN ROUTE (SUPER ADMIN & ADMIN)
    Route::get('/tools', [ToolsController::class, 'index'])->name('admin.index');
    Route::get('/kuotacuti', [ToolsController::class, 'indexCuti'])->name('cuti.index');
    Route::get('/employee-data', [ToolsController::class, 'indexEmployee'])->name('employee.index');
    Route::get('/payslip-data', [ToolsController::class, 'indexPayslip'])->name('payslip.index');
    Route::get('/request-datachange', [ToolsController::class, 'indexDataChange'])->name('datachange.index');

    // NEWS INFO ROUTE (SUPER ADMIN & ADMIN)
    Route::get('/news&info', [NewsController::class, 'index'])->name('news');
    Route::post('/store-news', [NewsController::class, 'store'])->name('news.post');
    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/update/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::post('/news/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');

    // PERATURAN PERUSAHAAN (PP) ROUTE (SUPERADMIN & ADMIN)
    Route::get('/peraturanperusahaan', [PPController::class, 'index'])->name('pp.index');
    Route::post('/peraturanperusahaan/dve/{id}', [PPController::class, 'destroyDVE'])->name('pp.deletedve');
    Route::post('/peraturanperusahaan/fm/{id}', [PPController::class, 'destroyFM'])->name('pp.deletefm');

    // ABSENSI ROUTE (SUPER ADMIN & ADMIN)
    Route::get('/absensikaryawan', [AbsensiController::class, 'indexAdmin'])->name('index.absensi');
    Route::post('/import-attendance', [AbsensiController::class, 'importData'])->name('import.absensi');
    Route::get('/export-attendance', [AbsensiController::class, 'exportData'])->name('export.absensi');
});
Route::group(['middleware' => ['auth', 'hakakses:superadmin']], function(){
    // HRIS ROUTE (SUPER ADMIN)
    Route::get('/hris', [HrisController::class, 'viewHRIS'])->name('viewHRIS');

    // USER ROUTE (SUPER ADMIN)
    Route::get('/export-users-excel', [UserController::class, 'exportUsers'])->name('exportUsers');
    Route::post('/import-users-excel', [UserController::class, 'importUsers'])->name('importUsers');
    Route::put('updateuser/{id}', [UserController::class, 'update'])->name('update');
    Route::post('user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

    // JOB DESCRIPTION ROUTE (SUPER ADMIN)
    Route::get('/jobdeskripsi', [JobController::class, 'indexAdmin'])->name('job.index');
    Route::post('/storejobdescription', [JobController::class, 'store'])->name('job.store');
    Route::get('/job/edit/{id}', [JobController::class, 'edit'])->name('job.edit');
    Route::put('/job/update/{id}', [JobController::class, 'update'])->name('job.update');
    Route::post('/job/delete/{id}', [JobController::class, 'destroy'])->name('job.delete');

    // POSITION ROUTE (SUPER ADMIN)
    Route::get('positiondata-index', [PositionController::class, 'index'])->name('position.index');
    Route::get('/export-position-excel', [PositionController::class, 'exportPosition'])->name('exportPosition');
    // Route::post('/import-position', [PositionController::class, 'importPosition'])->name('importPosition');

    // PAYSLIP ROUTE (SUPER ADMIN)
    Route::post('/importpayslip', [PaymentController::class, 'importPayslip'])->name('importPayslip');
    Route::get('/exportpayslipexcel', [PaymentController::class, 'exportPayslip'])->name('exportPayslip');
    Route::post('/tools-adduser', [ToolsController::class, 'addUser'])->name('addUser');
    Route::get('/indexqr', [ToolsController::class, 'indexQr'])->name('index.qr');
    Route::post('/storeqr', [ToolsController::class, 'storeQr'])->name('store.qr');
    Route::post('/deleteqr/{id}', [ToolsController::class, 'destroyQr'])->name('destroy.qr');
    Route::get('/access', [ToolsController::class, 'indexAccess'])->name('index.access');

    // PERATURAN PERUSAHAAN (PP) ROUTE (SUPER ADMIN)
    Route::post('/storecompanyregulation-fm', [PPController::class, 'storePPFM'])->name('store.PPFM');
    Route::post('/storecompanyregulation-dve', [PPController::class, 'storePPDVE'])->name('store.PPDVE');

    // CREDENTIALS USER EMAIL AND PASS
    Route::post('/send-user&password', [UserController::class, 'sendDefaultLogin'])->name('send.userpass');

    // DOWNLOAD TEMPLATE IMPORT
    Route::get('/exporttemplateattendance', [AttendanceController::class, 'templateAttendance'])->name(('Attend.template'));
    Route::get('/exporttemplatepayslips', [PaymentController::class, 'templatePayslip'])->name('payslip.template');
    Route::get('/exporttemplateuser', [UserController::class, 'templateUser'])->name('user.template');
});
