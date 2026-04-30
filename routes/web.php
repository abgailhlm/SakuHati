<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\RegistrationController; // Ditambahkan dari fix-bug
use App\Http\Controllers\ProfileController;      // Ditambahkan dari fix-bug

// ===================================
// RUTE PUBLIK (Dapat diakses tanpa login)
// ===================================

// Halaman Utama
Route::get('/', [WebController::class, 'home'])->name('home');
// Detail Program
Route::get('/program/{id}', [WebController::class, 'program'])->name('program');

// Pelacakan Donasi (DIKEMBALIKAN KE PUBLIK AGAR BISA DIAKSES PUBLIK)
Route::get('/track', [WebController::class, 'track'])->name('track');

// Halaman Statis
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/donation-report/view', [WebController::class, 'dummyReport'])->name('donation.report');

// ===================================
// RUTE AUTHENTIKASI
// ===================================

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Registrasi
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout (Harus bisa diakses publik untuk pengguna yang sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Lupa dan Reset Password
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'processForgotPassword'])->name('password.process');

Route::get('/reset-password/{id}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password/{id}', [AuthController::class, 'resetPassword'])->name('password.update');

// ===================================
// RUTE KHUSUS MEMBER (Harus Login)
// ===================================
Route::middleware(['auth'])->group(function () {

    // Dashboard member
    Route::get('/dashboard', [WebController::class, 'dashboard'])->name('dashboard');

    // Checkout / Donasi
    Route::get('/checkout/{program}', [DonationController::class, 'checkout'])->name('checkout');
    Route::post('/process-donation/{program}', [DonationController::class, 'processDonation'])->name('process.donation');
    Route::get('/donation/success', [DonationController::class, 'success'])->name('donation.success');

    // Subscribe Program
    Route::post('/program/{id}/subscribe', [WebController::class, 'subscribe'])->name('subscribe');

    // PENGATURAN PROFIL (Ditambahkan dari fix-bug)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // GANTI PASSWORD (Ditambahkan dari fix-bug)
    Route::get('/password/change', [ProfileController::class, 'changePassword'])->name('password.change');
    Route::post('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');
});
