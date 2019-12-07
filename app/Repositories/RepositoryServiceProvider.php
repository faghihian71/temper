<?php

namespace App\Repositories;

use App\Library\Csv\CsvLoader;
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
            'App\Repositories\Oauth\OnboardingFlowRepository'
        );

        $this->app->bind('App\Library\DataLoader\DataLoaderInterface', function ($app) {
            return new CsvLoader(public_path().'/csv/temper_data.csv');
        });

        $this->app->bind(
            'App\Repositories\OnboardingFlow\OnboardingFlowRepository',
            'App\Library\Oauth\OnboardingFlowRepository'
        );
    }
}
