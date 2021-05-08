<?php

namespace App\Providers;

use App\Http\Resources\CarDetailsResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        CarDetailsResource::withoutWrapping();
        Paginator::useBootstrap();
    }
}
