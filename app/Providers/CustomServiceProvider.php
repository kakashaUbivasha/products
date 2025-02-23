<?php

namespace App\Providers;

use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProductService::class, function ($app) {
            return new ProductService();
        });
        $this->app->singleton(OrderService::class, function ($app) {
            return new OrderService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
