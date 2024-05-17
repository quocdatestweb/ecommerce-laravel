<?php

namespace App\Providers;
use datnguyen\product\Repositories\ProductCategoryRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
          // Retrieve the categories and share them with all views
    $categories = app(ProductCategoryRepository::class)->getAll();
    View::composer('*', function ($view) use ($categories) {
        $view->with('categorys', $categories);
    });
    }
}
