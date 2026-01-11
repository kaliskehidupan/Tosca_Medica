<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamMedisController;
use Illuminate\Support\Facades\Route;

// 1. Root - Lempar ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Guest - Belum Login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

// 3. Auth - Sudah Login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // --- DUNIA SUPERADMIN ---
    // User biasa TIDAK BISA buka ini (Akan 403)
    Route::middleware('role:superadmin')->group(function () {
        Route::resource('users', UserController::class);
    });

    // --- DUNIA USER / PETUGAS ---
    // Superadmin TIDAK BISA buka ini (Akan 403)
    Route::middleware('role:user')->group(function () {
        Route::resource('pasien', PasienController::class);
        Route::resource('dokter', DokterController::class);
        Route::resource('obat', ObatController::class);
        Route::resource('rekam-medis', RekamMedisController::class);
    });
});
