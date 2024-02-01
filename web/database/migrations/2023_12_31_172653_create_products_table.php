<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
    
return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('img');
            $table->float('price');
            $table->string('info');
            $table->boolean('status')->default(1);
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->integer('platform_id')->unsigned(); 
            $table->foreign('platform_id')->references('id')->on('platforms'); 
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
