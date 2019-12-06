<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class OAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\Services\Oauth\OAuthServiceInterface',
            'App\Services\Oauth\OAuthService'
        );

    }
}
