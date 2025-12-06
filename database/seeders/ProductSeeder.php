<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {

            $name = "Produk Ke-$i";

            Product::create([
                'store_id'            => 1,
                'product_category_id' => rand(1, 5),
                'name'                => $name,
                'slug'                => Str::slug($name . '-' . $i),
                'description'         => "Deskripsi Produk Ke-$i",

                'condition'           => 'new',
                'price'               => rand(50000, 500000),
                'weight'              => rand(200, 2000),
                'stock'               => rand(5, 50),
            ]);
        }
    }
}
