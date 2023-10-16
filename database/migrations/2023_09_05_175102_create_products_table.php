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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'price');
            $table->string(column: 'feature_image_path')->nullable();
            $table->string(column: 'content');
            $table->integer(column: 'uer_id');
            $table->integer(column: 'category_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
//dc tao tu cau lenh kep  php artisan make:model Product -m 
