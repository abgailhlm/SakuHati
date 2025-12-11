<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;

// RUTE PUBLIK
Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/program/{id}', [WebController::class, 'program'])->name('program');

// DIKEMBALIKAN KE SINI AGAR BISA DIAKSES PUBLIK
Route::get('/track', [WebController::class, 'track'])->name('track');

Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/donation-report/view', [WebController::class, 'dummyReport'])->name('donation.report');

// RUTE AUTHENTIKASI
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// RUTE KHUSUS MEMBER (Harus Login)
Route::middleware(['auth'])->group(function () {

    // HAPUS Route::get('/track', ...) dari sini

    Route::get('/dashboard', [WebController::class, 'dashboard'])->name('dashboard');

    // Menampilkan form jumlah donasi
    Route::get('/checkout/{program}', [DonationController::class, 'checkout'])->name('checkout');

    // Memproses form donasi
    Route::post('/process-donation/{program}', [DonationController::class, 'processDonation'])->name('process.donation');

    // Halaman sukses donasi
    Route::get('/donation/success', [DonationController::class, 'success'])->name('donation.success');

    // Subscribe
    Route::post('/program/{id}/subscribe', [WebController::class, 'subscribe'])->name('subscribe');
});
