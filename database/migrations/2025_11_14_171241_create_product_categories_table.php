<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\text;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('category');
        $table->string('condition')->default('Baru');
        $table->integer('weight')->nullable();
        $table->integer('stock')->default(0);
        $table->integer('price');
        $table->string('main_image');
        $table->json('images')->nullable();
        $table->text('description')->nullable();

        // Store info
        $table->string('store_name')->default('Ayus Fashion');
        $table->string('store_logo')->default('store_logo.png');
        $table->string('store_location')->default('Malang');
        $table->boolean('store_verified')->default(true);

        $table->timestamps();
    });
}

};
