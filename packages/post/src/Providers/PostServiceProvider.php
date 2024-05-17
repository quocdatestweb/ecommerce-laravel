<?php

namespace datnguyen\post\Providers;

use Illuminate\Support\ServiceProvider;
use datnguyen\post\Repositories\PostCategoryRepository;
use datnguyen\post\Repositories\PostRepository;
use datnguyen\post\Interfaces\PostCategoryRepositoryInterface;
use datnguyen\post\Interfaces\PostRepositoryInterface;

class PostServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PostCategoryRepositoryInterface::class, PostCategoryRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/view', 'posts');
        }
}
