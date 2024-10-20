<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/pendaftaran', function () {
    return view('pendaftaran');
});

Route::get('/step1', function () {
    return view('step1'); // Pastikan ini mengarah ke view yang benar
})->name('step1');

