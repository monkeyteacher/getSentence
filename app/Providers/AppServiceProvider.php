<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\DailySentenceInterface;
use App\Services\GetDataFromMetaphorpsum;

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
        $this->app->bind(DailySentenceInterface::class, GetDataFromMetaphorpsum::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
