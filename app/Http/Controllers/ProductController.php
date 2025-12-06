<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $related = Product::where('category', $product->category)
                          ->where('id', '!=', $product->id)
                          ->take(3)
                          ->get();

        return view('product', compact('product', 'related'));
    }
}
