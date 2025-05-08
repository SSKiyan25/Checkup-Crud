<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BrgyController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('index');
});

// Simplified Routes CRUD for Cities, Brgys, and Patients
Route::resource('cities', CityController::class);
Route::resource('brgys', BrgyController::class);
Route::resource('patients', PatientController::class);

// Report Routes
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/awareness', [ReportController::class, 'awareness'])->name('reports.awareness');
Route::get('/reports/coronavirus', [ReportController::class, 'coronavirus'])->name('reports.coronavirus');
Route::get('/get-brgys-by-city', [ReportController::class, 'getBrgysByCity'])->name('get-brgys-by-city');


// Patient Status Routes
Route::get('/check-status', [PatientController::class, 'checkStatus'])->name('check-status.index');

// Auto Email Routes
//Route to Test if the Emailing works from configuration
Route::get('/test-email', function () {
    Mail::raw('This is a test email.', function ($message) {
        $message->to('joshsosme@gmail.com')
            ->subject('Test Email');
    });

    return 'Test email sent!';
});