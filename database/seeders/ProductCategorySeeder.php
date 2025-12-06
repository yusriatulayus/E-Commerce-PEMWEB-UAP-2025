<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Elektronik',
            'Pakaian',
            'Aksesoris',
            'Kebutuhan Rumah',
            'Olahraga',
        ];

        foreach ($categories as $category) {
            ProductCategory::create([
                'store_id' => 1, 
                'name' => $category,
                'slug' => strtolower($category),
                'description' => "Kategori untuk produk $category",
            ]);
        }
    }
}
