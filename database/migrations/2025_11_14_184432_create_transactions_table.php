<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('code')->unique();

            // TAMBAHAN WAJIB UAP
            $table->enum('type', ['topup', 'checkout', 'va', 'cod']);
            $table->enum('payment_method', ['wallet', 'va'])->nullable();
            $table->string('va_number')->nullable();
            $table->decimal('amount', 26, 2)->default(0);

            $table->foreignId('buyer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();

            $table->text('address');
            $table->string('address_id');
            $table->string('city');
            $table->string('postal_code');
            $table->string('shipping');
            $table->string('shipping_type');
            $table->decimal('shipping_cost', 26, 2);

            $table->string('tracking_number')->nullable();
            $table->decimal('tax', 26, 2);
            $table->decimal('grand_total', 26, 2);

            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
