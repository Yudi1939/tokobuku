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
        Route::get('daftarbuku', [AdminController::class,'index'])->name('daftarbuku');
        Route::get('daftaruser', [AdminController::class,'users'])->name('daftaruser');
        Route::get('daftarbayar', [AdminController::class,'bayar'])->name('daftarbayar');
        Route::get('daftarpesan', [AdminController::class,'pesan'])->name('daftarpesan');
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

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/daftarbuku', [AdminController::class, 'index'])->name('admin.daftarbuku');
//     Route::get('/admin/daftarbuku/create', [AdminController::class, 'create'])->name('admin.buku.create');
//     Route::post('/admin/daftarbuku', [AdminController::class, 'store'])->name('admin.buku.store');
//     Route::get('/admin/daftarbuku/{id}/edit', [AdminController::class, 'edit'])->name('admin.buku.edit');
//     Route::put('/admin/daftarbuku/{id}', [AdminController::class, 'update'])->name('admin.buku.update');
//     Route::delete('/admin/daftarbuku/{id}', [AdminController::class, 'destroy'])->name('admin.buku.destroy');
// });

require __DIR__.'/auth.php';
