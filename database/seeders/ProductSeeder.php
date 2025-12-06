<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'store_id' => 1,
            'product_category_id' => 1,
            'category' => 'Fashion Wanita',
            'name' => 'Hijab Pashmina Cashmere by Xaviera',
            'slug' => 'hijab-pashmina',

            // Deskripsi harus string biasa tanpa karakter aneh saat strict mode
            'description' => 'Hijab Cashmere Pink Coquette. Lembut, ringan, aesthetic.',

            // INI YANG PENTING
            'condition' => 'Baru',

            'price' => 50000,
            'main_image' => 'pashmina1.jpg',

            'images' => json_encode([
                'pashmina2.jpg',
                'pashmina3.jpg',
                'pashmina4.jpg'
            ]),

            'weight' => 250,
            'stock' => 12,

            'store_name' => 'Cheap & Use',
            'store_logo' => 'cheapnuse.jpg',
            'store_location' => 'Malang',
            'store_verified' => true,
        ]);
    }
}
