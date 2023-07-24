<?php

use App\Models\usuarios_gs;
use App\Mail\EmailReceived;
use App\Http\Controllers\ExpenseReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UsersCController;
use Symfony\Component\Mime\Email;
use App\Http\Controllers\EmailController;


Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/', function(){
   // $base = usuarios_gs::pluck('gmail');
   // Mail::to($base)->send(new EmailReceived($base));
//});

Route::get('/expenseReport', [ExpenseReportController::class, 'index'])->name('expenseReport.index');

Route::get('/mail', [ExpenseReportController::class, 'expenseReport'])->name('mail.expenseReport');

Route::get('/Notification', [NotificationController::class, 'notification'])->name('Notification.notification');

Route::post('/import.data', [NotificationController::class, 'importarDatos'])->name('import.data');

Route::get('/exportar', [NotificationController::class, 'exportar'])->name('/exportar');

Route::get('/EmailReceived', [EmailController::class, 'EmailReceived']);

Route::get('/Users', [UsersCController::class, 'usersC'])->name('Users.usersC');

Route::resource('/expense_reports', 'ExpenseReportController');

Route::get('/expense_reports/{id}/confirmDelete', [ExpenseReportController::class, 'expenseReport'])->name('expenseReport.confirmDelete');

Route::get('/expense_reports/{id}/confirmSendMail', 'ExpenseReportController@confirmSendMail');

Route::post('/expense_reports/{id}/sendMail', 'ExpenseReportController@sendMail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
