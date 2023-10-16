<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //đc thêm vào

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(length: 191); //đc thêm vào 

    }
}
// sau khi thêm câu lệnh Schema thì chạy dòng lệnh php artisan migrate để tạo table 