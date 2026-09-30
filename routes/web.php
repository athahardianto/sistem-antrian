<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\VideoController;

// Halaman Utama / Tampilan
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/panggilan-antrian', function () {
    return view('panggilan_antrian');
})->name('manajemen-antrian');

// Route::get('/monitoring', function () {
//     // return view('monitoring_antrian');

//     $videoController = new VideoController();
//     $activeVideo = $videoController->getActiveVideo();
//     return view('monitoring-antrian-2', compact('activeVideo'));
// })->name('monitoring');

// Langsung arahkan ke method controller
Route::get('/monitoring', [VideoController::class, 'indexMonitoring'])->name('monitoring');

Route::get('/nomor-antrian', function () {
    return view('input_antrian');
});

// Endpoint API / Logic Antrian
Route::prefix('antrian')->controller(AntrianController::class)->group(function () {
    Route::get('/today', 'antrianToday')->name('antrianToday');
    Route::get('/jumlah', 'antrianJumlah')->name('antrianJumlah');
    Route::get('/now', 'antrianNow')->name('antrianNow');
    Route::get('/selanjutnya', 'antrianSelanjutnya')->name('antrianSelanjutnya');
    Route::get('/sisa', 'antrianSisa')->name('antrianSisa');

    Route::post('/', 'inputAntrian')->name('inputAntrian');
    Route::put('/{id}', 'updateStatusAntrian')->name('updateStatusAntrian');
    Route::delete('/reset', 'resetAntrian')->name('antrianReset');
});

Route::get('/pengaturan-video', [VideoController::class, 'indexAdmin'])->name('admin.video');
Route::post('/pengaturan-video', [VideoController::class, 'updateVideo'])->name('admin.video.update');