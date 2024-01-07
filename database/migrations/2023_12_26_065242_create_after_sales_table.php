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
        Schema::create('after_sales', function (Blueprint $table) {
            $table->id();
            $table->string('after_sale_id')->unique();
            $table->foreignId('sale_id')->constrained('sales')->onDelete('cascade');
            $table->text('remarks');
            $table->date('date');
            $table->text('complain');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('after_sales');
    }
};
