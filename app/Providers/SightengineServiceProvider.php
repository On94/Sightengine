<?php

namespace App\Providers;


use App\Services\Sightengine;
use Illuminate\Support\ServiceProvider;
use Sightengine\SightengineClient;


class SightengineServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('sightengine', function () {
            return new Sightengine(
                (new SightengineClient(env('SIGHTENGINE_USER'), env('SIGHTENGINE_SECRET')))
            );
        });
    }
}
