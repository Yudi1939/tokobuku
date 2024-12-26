<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\view;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('admin')->group(function () {
        Route::get('daftarbuku',[AdminController::class,'index'])->name('daftarbuku');
        Route::get('daftaruser', [view::class,'daftaruser'])->name('daftaruser');
    });
    Route::prefix('user')->group(function () {
        Route::get('home',[UserController::class,'index'])->name('home');
        Route::get('detail/{id}', [UserController::class,'showDetail'])->name('detail');
        Route::post('pesanan/{id}', [UserController::class,'pesanan'])->name('pesanan');
        Route::get('pembayaran/{id}', [UserController::class,'pembayaran'])->name('pembayaran');
        Route::post('storePembayaran/{id}', [UserController::class,'pembayaranStore'])->name('storePembayaran');
        Route::get('daftarpesanan', [UserController::class,'daftarPesanan'])->name('daftarpesanan');
        Route::get('selesaiPesanan/{id}', [UserController::class,'selesaiPesanan'])->name('selesaiPesanan');
        Route::get('search', [UserController::class,'search'])->name('search');
        Route::get('filter', [UserController::class,'filter'])->name('filter');
    });
});

require __DIR__.'/auth.php';
