<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; // tabel products

    protected $fillable = [
        'store_id',
        'product_category_id',
        'category',
        'name',
        'slug',
        'description',
        'condition',
        'price',
        'main_image',
        'images',
        'weight',
        'stock',
        'store_name',
        'store_logo',
        'store_location',
        'store_verified',
    ];

    protected $casts = [
        'images' => 'array',
        'store_verified' => 'boolean',
    ];
}
