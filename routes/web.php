<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntigenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestResultController;
use App\Models\MailLog;
use App\Models\TestResult;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dashboard', function () {
    $total = TestResult::count();
    $users = User::count();
    $delivered = MailLog::where('delivery_status', 'Success')->count();
    $failed = MailLog::where('delivery_status', 'Failed')->count();
    //$bounced = TestResult::where('status', 'bounced')->count();
    $patients = TestResult::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
    $express_day = TestResult::whereDate('created_at', Carbon::today())
    ->where('patient_type', '=', 'Express')
    ->count();

    $normal_day = TestResult::whereDate('created_at', Carbon::today())
    ->where('patient_type', '=', 'Normal')
    ->count();

    return view('dashboard', ["total"=>$total, "users"=>$users, "delivered"=>$delivered,
        "failed"=>$failed, "patients"=>$patients, "express_day"=> $express_day, "normal_day"=>$normal_day]
    );
})->middleware(['auth'])->name('dashboard');


Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/', function () {
//     //$data = DB::table('test_categories')->get();
//     return view('welcome');
// });

Route::get('upload-new-case', [TestResultController::class, 'new_case'])->name('upload.new.case');
Route::get('/prc-file-download', [TestResultController::class, 'prc_sample']);
Route::get('/antigen-file-download', [TestResultController::class, 'antigen_sample'])->name('antigen.file.download');

Route::get('show-prc-test-results', [TestResultController::class, 'index']);
Route::post('send-patient-mail', [TestResultController::class, 'sendPatientMailPrc']);
Route::get('print-test-result/{id}', [TestResultController::class, 'printPrc']);
Route::get('download-prc-sample', [TestResultController::class, 'downloadPcr']);
Route::post('generate-pdf-result', [TestResultController::class, 'pdfResult']);

Route::get('send-result-mail/{id}', [TestResultController::class, 'mailResult']);

Route::post('send-email-pdf', [TestResultController::class, 'sendmail']);

//send mail to multiple patients
Route::post('send-multiple-email', [TestResultController::class, 'multi_mail']);
Route::post('patient-send-multi-mail', [TestResultController::class, 'send_multi_mail']);

//Profile update
Route::get('profile/change-password', [ProfileController::class, 'changePassword']);
Route::put('profile/update-password', [ProfileController::class, 'updatePassword']);
Route::get('profile/activity-logs', [ProfileController::class, 'single_log_history']);

//zip download
Route::get('download-multiple', [TestResultController::class, 'download_zip']);
Route::get('zip-file-download', [TestResultController::class, 'zip_file_download']);


//Route::post('', [TestResultController::class, '']);
// Antigen section
Route::get('antigen/show-all-results', [AntigenController::class, 'index'])->name('antigen.show.all.results');
Route::get('print-antigen-result/{id}', [AntigenController::class, 'printAntigen']);
Route::post('send-antigen-mail-result', [AntigenController::class, 'sendPatientMailAntigen']);
Route::post('send-antigen-multiple', [AntigenController::class, 'send_multi_mail_antigen']);
Route::get('verify-antigen-result/{id}', [AntigenController::class, 'antigen_qrcode']);



Route::get('file-import-export', [TestResultController::class, 'fileImportExport']);
Route::post('file-import', [TestResultController::class, 'fileImport'])->name('file-import');
//Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');

Route::get('admin/show-all-users', [AdminController::class, 'allUsers'])->name('show.all.users');
Route::get('admin/create-new-user', [AdminController::class, 'newUser'])->name('create.new.user');
Route::post('admin/add-new-user', [AdminController::class, 'storeUser']);
Route::get('/admin/edit-user-record/{id}', [AdminController::class, 'edit'])->name('admin.edit.user.record.id');
Route::put('admin/update-user/{id}', [AdminController::class, 'update']);
Route::delete('admin/delete-user/{id}', [AdminController::class, 'delete']);

//Logs
Route::get('/admin/log-history', [AdminController::class, 'log_history'])->name('admin.log.history');
Route::get('admin/mail-delivery-status', [AdminController::class, 'mail_delivery'])->name('admin.mail.delivery.status');
Route::get('/admin/all-mail-logs', [AdminController::class, 'all_mail_logs']);

//zip test section
Route::get('mul-zip-download', [TestResultController::class, 'mul_zip_file']);
Route::get('admin/show-zipper-files', [TestResultController::class, 'zipper_job']);
Route::get('admin/build-zip-test', [TestResultController::class, 'build_zip']);


Route::get('verified-results/{document_number}', [TestResultController::class, 'single_test_result']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

require __DIR__.'/auth.php';
