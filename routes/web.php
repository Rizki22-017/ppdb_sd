<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('index');
})->name('home');

// Routes for registration process, requiring authentication
Route::middleware('auth')->group(function () {
    // Start Registration and dynamic next step
    Route::get('/pendaftaran', [RegistrationController::class, 'startRegistration'])->name('registration.start');

    // Step routes with middleware for restricting access if user is at result step
    Route::middleware('check.step')->group(function () {
        Route::get('/pendaftaran/step1', [RegistrationController::class, 'showStep1'])->name('step1.show');
        Route::post('/pendaftaran/step1', [RegistrationController::class, 'postStep1'])->name('step1.post');

        Route::get('/pendaftaran/step2/{user_id}', [RegistrationController::class, 'showStep2'])->name('step2.show');
        Route::post('/pendaftaran/step2/{user_id}', [RegistrationController::class, 'postStep2'])->name('step2.post');

        Route::get('/pendaftaran/step3/{user_id}', [RegistrationController::class, 'showStep3'])->name('step3.show');
        Route::post('/pendaftaran/step3/{user_id}', [RegistrationController::class, 'postStep3'])->name('step3.post');

        Route::get('/pendaftaran/proof_payment/{user_id}', [RegistrationController::class, 'showProofPayment'])->name('proofPayment.show');
        Route::post('/pendaftaran/proof_payment/{user_id}', [RegistrationController::class, 'postProofPayment'])->name('proofPayment.post');
        // Result page for users who have completed registration
        Route::get('/result', [ProfileController::class, 'result'])->name('resultPage');
        Route::get('/result/download-pdf', [ProfileController::class, 'downloadPdf'])->name('result.downloadPdf');
    });



    // Profile management for authenticated users
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/download-pdf', [ProfileController::class, 'downloadPdf'])->name('profile.downloadPdf');
    });
});

// Dashboard routes restricted to admin users
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('dashboard/registration')->group(function () {
        Route::get('{id}', [DashboardController::class, 'show'])->name('registration.show');
        Route::get('{id}/edit', [DashboardController::class, 'edit'])->name('registration.edit');
        Route::put('{id}', [DashboardController::class, 'update'])->name('registration.update');
        Route::delete('{id}', [DashboardController::class, 'destroy'])->name('registration.destroy');
        Route::patch('{id}/status', [DashboardController::class, 'updateStatus'])->name('registration.updateStatus');
    });

    Route::post('/dashboard/reset', [DashboardController::class, 'reset'])->name('dashboard.reset');
    Route::put('/registrations/{id}/update-status', [DashboardController::class, 'updateStatus'])->name('registrations.updateStatus');
    Route::get('/dashboard/registration/{id}/download-pdf', [DashboardController::class, 'downloadPdf'])
        ->name('registration.downloadPdf');
    Route::get('/dashboard/export-excel', [DashboardController::class, 'exportExcel'])->name('dashboard.exportExcel');
});

// Authentication routes
require __DIR__ . '/auth.php';