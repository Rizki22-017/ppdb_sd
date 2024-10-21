<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/pendaftaran', [RegistrationController::class, 'showForm'])->name('pendaftaran');

// Post routes for each step
Route::post('/step1', [RegistrationController::class, 'postStep1'])->name('register.step1');
Route::post('/step2', [RegistrationController::class, 'postStep2'])->name('register.step2');
Route::post('/final', [RegistrationController::class, 'postStep3'])->name('register.final');

// Success page route
Route::get('/success', function () {
    return view('success');
})->name('successPage');