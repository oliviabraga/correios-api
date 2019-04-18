<?php

namespace App\Providers;

use App\Correios\CorreiosScraper;
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
        $this->app->singleton(CorreiosScraper::class, function ($app) {
            return new CorreiosScraper();
        });
    }
}
