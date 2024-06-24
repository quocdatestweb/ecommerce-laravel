<?php

namespace App\Providers;
use datnguyen\product\Repositories\ProductCategoryRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use datnguyen\user\Models\Prize;

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
    $auth_admin = Auth::guard('admin')->user();
    $role = $auth_admin ? $auth_admin->role : null; // Perform null check
    $prizes = Prize::where('status', 'active')
    ->paginate(11);
    
    View::composer('*', function ($view) use ($categories, $role,$prizes) {
        $view->with([
            'categorys' => $categories,
            'role' => $role,
            'prizes' => $prizes,

       ]);
    });
    }
}
