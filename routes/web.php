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

// Registration routes for multi-step form
Route::get('/pendaftaran', [RegistrationController::class, 'showForm'])->name('pendaftaran');

// Step 1: Student data
Route::post('/step1', [RegistrationController::class, 'postStep1'])->name('register.step1');

// Step 2: Parent data and tanggungan
Route::get('/step2', [RegistrationController::class, 'showStep2'])->name('step2');
Route::post('/step2', [RegistrationController::class, 'postStep2'])->name('register.step2');

// Step 3: Wali data
Route::get('/step3', [RegistrationController::class, 'showStep3'])->name('step3');
Route::post('/final', [RegistrationController::class, 'postStep3'])->name('register.final');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Dashboard and Profile (for authenticated users)
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('admin')->name('dashboard');

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';