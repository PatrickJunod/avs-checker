<?php

namespace PatrickJunod\AvsChecker;

use Illuminate\Support\ServiceProvider;

class AvsCheckerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('AvsChecker', function ($app) {
            return new AvsChecker();
        });
    }

    public function boot()
    {
        //
    }
}
