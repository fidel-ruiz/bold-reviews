<?php

namespace App\Providers;

use App\Repositories\ShopifyAppRepository;
use App\Repositories\ShopifyAppRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(ShopifyAppRepositoryInterface::class, ShopifyAppRepository::class);
    }
}
