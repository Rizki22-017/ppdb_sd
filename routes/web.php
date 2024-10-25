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
Route::get('/success', function () {
    return view('success');
})->name('successPage');

// Registration routes for multi-step form with optional auth middleware if needed
Route::middleware('auth')->group(function () {

    // Step 1: Show Step 1 form
    Route::get('/pendaftaran', [RegistrationController::class, 'showStep1'])->name('step1.show');

    // Step 1: Submit Step 1 form data
    Route::post('/pendaftaran/step1', [RegistrationController::class, 'postStep1'])->name('step1.post');

    // Step 2: Show Step 2 form (expects user_id)
    Route::get('/pendaftaran/step2/{user_id}', [RegistrationController::class, 'showStep2'])->name('step2.show');

    // Step 2: Submit Step 2 form data
    Route::post('/pendaftaran/step2', [RegistrationController::class, 'postStep2'])->name('step2.post');

    // Step 3: Show Step 3 form (expects user_id)
    Route::get('/pendaftaran/step3/{user_id}', [RegistrationController::class, 'showStep3'])->name('step3.show');

    // Step 3: Submit Step 3 form data and finalize registration
    Route::post('/pendaftaran/step3', [RegistrationController::class, 'postStep3'])->name('step3.post');
});

// Dashboard and Profile routes (for authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
