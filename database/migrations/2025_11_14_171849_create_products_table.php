<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();

        // Relasi
        $table->unsignedBigInteger('store_id')->nullable();
        $table->unsignedBigInteger('product_category_id')->nullable();

        // Data utama
        $table->string('name');
        $table->string('slug')->unique();
        $table->text('description')->nullable();
        $table->string('condition')->default('Baru');
        $table->integer('price');
        $table->integer('weight')->nullable();
        $table->integer('stock')->default(0);

        $table->timestamps();
    });
}
};
