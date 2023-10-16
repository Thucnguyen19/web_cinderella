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
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes(); //dc them vao
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(columns: 'deleted_at'); //dc them vao
        });
    }
};
//Dc tao ra tu cau lenh php artisan make:migration add_column_deleted_at_table_categories --table=categories
//sau khi them cau lenh vao 2 ham thi chay dong lenh php artisan migrate se thay trong database bảng category xuất hiện thêm cột deleted_at 