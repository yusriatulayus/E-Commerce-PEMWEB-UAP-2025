<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        Store::create([
            'user_id'     => 2,
            'name'        => 'Toko Sukses Makmur',
            'address'     => 'Jl. Anggrek No. 88',
            'city'        => 'Surabaya',       
            'postal_code' => '60123',           
            'phone'       => '081234567890',
            'logo'        => 'default.png',
            'about'       => 'Toko ini menjual berbagai macam produk kebutuhan sehari-hari.',
            'address_id'  => 1,
            'is_verified' => false,
        ]);

    }
}
