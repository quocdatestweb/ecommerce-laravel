<?php

namespace datnguyen\product\Providers;

use Illuminate\Support\ServiceProvider;
use datnguyen\product\Repositories\ProductCategoryRepository;
use datnguyen\product\Repositories\ProductRepository;
use datnguyen\product\Interfaces\ProductCategoryRepositoryInterface;
use datnguyen\product\Interfaces\ProductRepositoryInterface;

class ProductServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProductCategoryRepositoryInterface::class, ProductCategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/view', 'products');
        }
}
