<?php

namespace datnguyen\user\Providers;

use Illuminate\Support\ServiceProvider;
use datnguyen\user\Repositories\UserRepository;
use datnguyen\user\Interfaces\UserRepositoryInterface;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/view', 'user');
        }
}
