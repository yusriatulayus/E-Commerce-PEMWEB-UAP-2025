<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// =============================
// HOME
// =============================
Route::get('/', function () {
    return view('welcome');
});

// =============================
// DASHBOARD DEFAULT BREEZE
// =============================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// =============================
// DASHBOARD ADMIN
// =============================
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// =============================
// DASHBOARD MEMBER
// =============================
Route::middleware(['auth', 'verified', 'member'])->group(function () {
    Route::get('/member/dashboard', function () {
        return view('member.dashboard');
    })->name('member.dashboard');
});

// =============================
// PROFILE ROUTES
// =============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', function () {
    return view('home');
});

// =============================
// SELLER ROUTES (MEMBER ONLY)
// =============================
Route::middleware(['auth', 'verified', 'member'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {

        // CRUD Kategori Produk
        Route::resource('categories', \App\Http\Controllers\Seller\ProductCategoryController::class);
    });

require __DIR__.'/auth.php';
