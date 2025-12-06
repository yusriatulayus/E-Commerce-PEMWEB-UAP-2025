<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * HALAMAN DETAIL PRODUK
     */
    public function show($id)
    {
        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Ambil produk terkait berdasarkan kategori yang sama
        $related = Product::where('category', $product->category)
                          ->where('id', '!=', $product->id)
                          ->take(3)
                          ->get();

        return view('product', [
            'product' => $product,
            'related' => $related
        ]);
    }

    /**
     * (OPTIONAL) HALAMAN SEMUA PRODUK
     * /products
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);

        return view('products', compact('products'));
    }

    /**
     * (OPTIONAL) TAMBAH PRODUK (FOR ADMIN)
     */
    public function create()
    {
        return view('product-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'price'     => 'required|numeric',
            'category'  => 'required',
            'main_image'=> 'required',
        ]);

        Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'category'    => $request->category,
            'condition'   => $request->condition ?? 'Baru',
            'weight'      => $request->weight,
            'stock'       => $request->stock,
            'description' => $request->description,
            'main_image'  => $request->main_image,
            'images'      => json_encode($request->images ?? []),
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
}
