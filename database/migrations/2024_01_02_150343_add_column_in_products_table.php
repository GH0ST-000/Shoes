<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku')->after('image_url');
            $table->string('quantity')->after('sku');
            $table->string('in_a_stock')->after('sku');
        });
    }


    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('sku');
            $table->dropColumn('quantity');
            $table->dropColumn('in_a_stock');
        });
    }
};
