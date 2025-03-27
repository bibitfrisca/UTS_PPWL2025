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
        Schema::create('stockouts', function (Blueprint $table) {
            $table->id();
            $table->string('stockout_code')->unique();
            $table->text('product_name'); // To store comma-separated product names
            $table->text('quantity'); // To store comma-separated quantities
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockouts');
    }
};
