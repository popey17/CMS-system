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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sale_id')->unique();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');;
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');;
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');;
            $table->date('sale_date')->nullable();
            $table->float('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
