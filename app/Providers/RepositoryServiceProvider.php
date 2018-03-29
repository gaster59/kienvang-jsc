<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\CategoriesRepository::class, \App\Repositories\CategoriesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductsRepository::class, \App\Repositories\ProductsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OrdersRepository::class, \App\Repositories\OrdersRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OrderDetailsRepository::class, \App\Repositories\OrderDetailsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ExpenseRepository::class, \App\Repositories\ExpenseRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CompaniesRepository::class, \App\Repositories\CompaniesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NewsRepository::class, \App\Repositories\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BannerRepository::class, \App\Repositories\BannerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MajorRepository::class, \App\Repositories\MajorRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\JobRepository::class, \App\Repositories\JobRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ApplyRepository::class, \App\Repositories\ApplyRepositoryEloquent::class);
        //:end-bindings:
    }
}
