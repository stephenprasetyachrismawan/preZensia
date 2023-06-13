<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPresensi;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\RealtimeLaporan;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresensiController;

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

Route::middleware('auth')->group(function () {
    Route::controller(ClassController::class)->prefix('c')->group(function () {
        Route::get('create', 'create')->name('classes.create');
        Route::post('create', 'store')->name('classes.create.store');
        Route::get('join', 'join')->name('classes.join');
        Route::post('join', 'check')->name('classes.join.check');
        Route::get('{id}', 'index')->name('classes.home');
        Route::get('{id}/{cd}', 'linkjoin')->name('classes.linkjoin');
        Route::post('archive', 'archive')->name('classes.archive');
        Route::post('unarchive', 'unarchive')->name('classes.unarchive');
        Route::post('unenroll', 'unenroll')->name('classes.unenroll');
    });
    Route::resource('/buatpresensi', App\Http\Controllers\PresensiController::class);
});

Route::get('archive', [ClassController::class, 'get_archive'])->middleware(['auth', 'verified'])->name('archive');

//Pusher
Route::post('presensi', [PresensiController::class, 'simpan'])->middleware(['auth', 'verified']); //kirim
// Route::get('laporan-realtime', function () {
//     return view('laporan_presensi');
// })->middleware(['auth', 'verified']); //terima

//Buat route untuk realtime dengan post
Route::post('realtime', [PresensiController::class, 'lihat_realtime'])->middleware(['auth', 'verified']);
Route::get('laporan/{id}', [PresensiController::class, 'lihat_laporan'])->middleware(['auth', 'verified'])->name('laporan');

//View Isi Presensi
Route::get(
    'isi-presensi',
    function () {
        return view('isi_presensi');
    }
)->middleware(['auth', 'verified']);

Route::post('ajax-resp', [LaporanController::class, 'chartReq'])->name('chartReq');







// ---------------------------------------------------------------------
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [ClassController::class, 'getkelas'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tes', function () {
    return view('tes');
});

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

Route::post('/presensi/edit', [PresensiController::class, 'update'])->name('presensi.edit');
Route::post('presensi/delete', [PresensiController::class, 'delete'])->name('presensi.delete');
Route::post('/listpresensi/edit', [PresensiController::class, 'listedit'])->name('listpresensi.edit');


require __DIR__ . '/auth.php';
