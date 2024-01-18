<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
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
    return view('home');
});
//login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
});
Route::get('/logout', [AuthController::class, 'logout']);
//dashboard
Route::get('/dashboard', [PengaduanController::class, 'dashboard']);
Route::get('/pengaduan', [PengaduanController::class, 'showCMS']);
//hapus pengaduan
Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
//admin reply
Route::post('/pengaduan/{id}/tanggapan', [PengaduanController::class, 'reply'])->name('pengaduan.tanggapan');
Route::get('/tanggapan', [PengaduanController::class, 'showTanggapan']);
Route::delete('/tanggapan/{id}', [PengaduanController::class, 'tanggapanDestroy'])->name('tanggapan.destroy');

//form
Route::get('/form', [PengaduanController::class, 'index']);
Route::post('/form/store', 'App\Http\Controllers\PengaduanController@store')->name('form.store');
//history
Route::get('/histori', [PengaduanController::class, 'show']);
