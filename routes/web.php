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
// DASHBOARD MEMBER (PELANGGAN)
// =============================
Route::middleware(['auth', 'verified', 'member'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {
        Route::resource('categories', \App\Http\Controllers\Seller\ProductCategoryController::class);
    });

// =============================
// PROFILE ROUTES
// =============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =============================
// HALAMAN HOME TAMBAHAN (TIDAK MENGGANGGU STRUKTUR)
// =============================
Route::get('/', function () {
    return view('home');
});

// =============================
// SELLER ROUTES (MEMBER WAJIB PUNYA TOKO)
// =============================
Route::middleware(['auth', 'verified', 'member'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {

        // =============================
        // SELLER DASHBOARD (WAJIB ADA)
        // =============================
        Route::get('/dashboard', function () {
            return view('seller.dashboard');
        })->name('dashboard');

        // =============================
        // CRUD Kategori Produk Seller
        // =============================
        Route::resource('categories', \App\Http\Controllers\Seller\ProductCategoryController::class);

        Route::middleware(['auth'])->group(function () {
    Route::post('/wallet/checkout', [WalletController::class, 'checkout'])
        ->name('wallet.checkout');
         });
    });

    Route::middleware('auth')->group(function () {

    // route profile kamu di sini...

    // ------- WALLET (TOPUP) -------
    Route::get('/wallet/topup', [WalletController::class, 'topupForm'])
        ->name('wallet.topup.form');

    Route::post('/wallet/topup', [WalletController::class, 'topup'])
        ->name('wallet.topup');

    Route::post('/wallet/topup/{transaction}/confirm', [WalletController::class, 'confirmTopup'])
        ->name('wallet.topup.confirm');
});

require __DIR__.'/auth.php';
