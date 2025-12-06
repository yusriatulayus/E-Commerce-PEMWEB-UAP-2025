<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

Route::get('/', function () {
    return view('home');
});

// /product/1 → redirect ke slug
Route::get('/product/{id}', function ($id) {
    $product = Product::find($id);
    if ($product) {
        return redirect()->route('product.show', $product->slug);
    }
    abort(404);
})->whereNumber('id'); // 🚀 FIX TERPENTING

// /product/hijab-pashmina → controller
Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product.show');
Route::get('/dashboard', function () {
    return view('home');
})->name('dashboard');
