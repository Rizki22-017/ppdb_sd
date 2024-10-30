<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('index');
})->name('home');

// Success page route (public)
Route::get('/profile', function () {
    return view('profile.edit');
})->name('profilePage');

// Registration routes for multi-step form with authentication middleware
Route::middleware('auth')->group(function () {
    // Step 1: Show and submit Step 1 form data
    Route::get('/pendaftaran', [RegistrationController::class, 'showStep1'])->name('step1.show');
    Route::post('/pendaftaran/step1', [RegistrationController::class, 'postStep1'])->name('step1.post');

    // Step 2: Show and submit Step 2 form data
    Route::get('/pendaftaran/step2/{user_id}', [RegistrationController::class, 'showStep2'])->name('step2.show');
    Route::post('/pendaftaran/step2/{user_id}', [RegistrationController::class, 'postStep2'])->name('step2.post');

    // Step 3: Show and submit Step 3 form data
    Route::get('/pendaftaran/step3/{user_id}', [RegistrationController::class, 'showStep3'])->name('step3.show');
    Route::post('/pendaftaran/step3/{user_id}', [RegistrationController::class, 'postStep3'])->name('step3.post');

    // Proof of Payment Upload: Show and handle file upload
    Route::get('/pendaftaran/proof_payment/{user_id}', [RegistrationController::class, 'showProofPayment'])->name('proofPayment.show');
    Route::post('/pendaftaran/proof_payment/{user_id}', [RegistrationController::class, 'postProofPayment'])->name('proofPayment.post');
});

// Profile management routes for all authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/download-pdf', [ProfileController::class, 'downloadPdf'])->name('profile.downloadPdf');
});

// Dashboard routes restricted to admin users
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Registration management routes for the dashboard
    Route::prefix('dashboard/registration')->group(function () {
        Route::get('{id}', [DashboardController::class, 'show'])->name('registration.show');
        Route::get('{id}/edit', [DashboardController::class, 'edit'])->name('registration.edit');
        Route::put('{id}', [DashboardController::class, 'update'])->name('registration.update');
        Route::delete('{id}', [DashboardController::class, 'destroy'])->name('registration.destroy');
        Route::patch('{id}/status', [DashboardController::class, 'updateStatus'])->name('registration.updateStatus');
    });

    // Additional admin routes
    Route::post('/dashboard/reset', [DashboardController::class, 'reset'])->name('dashboard.reset');
    Route::put('/registrations/{id}/update-status', [DashboardController::class, 'updateStatus'])->name('registrations.updateStatus');
});

// Authentication routes
require __DIR__ . '/auth.php';
