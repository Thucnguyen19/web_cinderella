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
        Schema::table('menus', function (Blueprint $table) {
            $table->string(column: 'slug'); //dc them
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string(column: 'slug'); //dc them
        });
    }
};
//đc tạo từ câu lệnh php artisan make:migration add_column_slug_to_menus_table --table=menus để thêm cột slug vào trong menu 
//sau khi tao xong chay cau lenh php artisan migrate 