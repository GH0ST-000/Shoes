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
            $table->string('product_name');
            $table->longText('tags')->nullable();
            $table->string('price')->nullable();;
            $table->longText('size')->nullable();;
            $table->longText('description')->nullable();;
            $table->longText('brands')->nullable();;
            $table->longText('categories')->nullable();;
            $table->longText('image_url')->nullable();;
            $table->longText('color')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
