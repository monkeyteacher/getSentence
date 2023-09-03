<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\DailySentenceInterface;
use App\Services\GetDataFromMetaphorpsum;
use App\Services\GetDataFromItsthisforthat;

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
        if (request()->bind === 'metaphorpsum') {
            $this->app->bind(DailySentenceInterface::class, GetDataFromMetaphorpsum::class);
        } elseif (request()->bind === 'itsthisforthat') {
            $this->app->bind(DailySentenceInterface::class, GetDataFromItsthisforthat::class);
        } else {
            $this->app->bind(DailySentenceInterface::class, GetDataFromMetaphorpsum::class);
        }
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
