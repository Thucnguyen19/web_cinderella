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
        if (!Schema::hasTable('products')) return; // chỉ thêm cột nếu bảng 'products' tồn tại
        Schema::table('products', function (Blueprint $table) {
            $table->string(column: 'feature_image_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(columns: 'feature_image_name');
        });
    }
};
//dc tao tu cau lenh php artisan make:migration add_column_image_name --table=products 