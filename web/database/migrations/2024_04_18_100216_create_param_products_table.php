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
        Schema::create('param_products', function (Blueprint $table) {
            $table->id();
            $table->integer('param_id');
            $table->foreign('param_id')->references('id')->on('params')->onDelete('cascade');;
            $table->integer('product_id')->unsigned(); 
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');; 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('param_products');
    }
};
