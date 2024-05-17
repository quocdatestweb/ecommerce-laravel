<?php

namespace datnguyen\admin\Providers;

use Illuminate\Support\ServiceProvider;
use datnguyen\admin\Repositories\AdminRepository;
use datnguyen\admin\Interfaces\AdminRepositoryInterface;

class AdminServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/view', 'admin');
        }
}
