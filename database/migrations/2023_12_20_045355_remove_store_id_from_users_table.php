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
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign('users_store_id_foreign');
    
            // Then drop the column
            $table->dropColumn('store_id');       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the column back
        $table->unsignedBigInteger('store_id');

        // Then recreate the foreign key constraint
        $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }
};
