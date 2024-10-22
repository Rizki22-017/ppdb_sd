<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| These are the web routes for your application, loaded by the RouteServiceProvider.
| All routes are assigned to the "web" middleware group.
|
*/

// Public routes
Route::get('/', function () {
    return view('index');
})->name('home');

// Success page route (public)
Route::get('/success', function () {
    return view('success');
})->name('successPage');

// Registration routes
Route::get('/pendaftaran', [RegistrationController::class, 'showForm'])->name('pendaftaran');

// Post routes for registration steps
Route::post('/step1', [RegistrationController::class, 'postStep1'])->name('register.step1');
Route::post('/step2', [RegistrationController::class, 'postStep2'])->name('register.step2');
Route::post('/final', [RegistrationController::class, 'postStep3'])->name('register.final');

// User must be authenticated to access these routes
Route::middleware('auth')->group(function () {

    // Only admins can access the dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('admin')->name('dashboard');

    // Profile routes (only for authenticated users)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
