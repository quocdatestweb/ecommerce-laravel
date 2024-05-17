<?php

namespace datnguyen\cart\Providers;

use Illuminate\Support\ServiceProvider;
use datnguyen\cart\Repositories\CartRepository;
use datnguyen\cart\Interfaces\CartRepositoryInterface;

class CartServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/view', 'carts');
        }
}
