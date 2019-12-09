<?php

namespace App\Repositories;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {



        $this->app->bind(
            'App\Repositories\Oauth\OauthPasswordRepositoryInterface',
            'App\Repositories\Oauth\OauthPasswordRepository'
        );

        $this->app->bind(
            'App\Repositories\OnboardingFlow\OnboardingFlowRepositoryInterface',
            'App\Repositories\OnboardingFlow\OnboardingFlowRepository'
        );

        $this->app->bind('App\Library\DataLoader\DataLoaderInterface', function ($app) {
            return new \App\Library\DataLoader\Csv\CsvLoader(public_path().'/csv/temper_data.csv');
        });

    }
}
