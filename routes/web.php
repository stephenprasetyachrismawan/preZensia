<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPresensi;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\RealtimeLaporan;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;

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

// ------------------------------------------------------------------

Route::get('/classes', function () {
    return view('class');
})->middleware(['auth', 'verified'])->name('classes');

Route::middleware('auth')->group(function () {
    Route::controller(ClassController::class)->prefix('classes')->group(function () {
        Route::get('create', 'create')->name('classes.create');
        Route::post('create', 'store')->name('classes.create.store');
        Route::get('join', 'join')->name('classes.join');
        Route::post('join', 'check')->name('classes.join.check');
    });
});

//Pusher
Route::post('presensi', [FormPresensi::class, 'simpan'])->middleware(['auth', 'verified']);  //kirim
Route::get('laporan-realtime', function () {
    return view('laporan_presensi');
})->middleware(['auth', 'verified']);  //terima

//View Isi Presensi
Route::get(
    'isi-presensi',
    function () {
        return view('isi_presensi');
    }
)->middleware(['auth', 'verified']);









// ---------------------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('class');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/password', function () {
    return view('password');
})->middleware(['auth', 'verified'])->name('password');

Route::post('/password', [GoogleController::class, 'updatepassword']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
require __DIR__ . '/auth.php';
