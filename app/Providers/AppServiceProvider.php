<?php

namespace App\Providers;

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
            
        $this->app->bind('App\Library\DataLoader\DataLoaderInterface', function ($app) {
            return new \App\Library\DataLoader\Csv\CsvLoader(public_path().'/csv/temper_data.csv');
        });

       $this->app->bind(
            'App\Repositories\OnboardingFlow\OnboardingFlowRepositoryInterface',
            'App\Repositories\OnboardingFlow\OnboardingFlowRepository'
        );


        $this->app->bind(
            'App\Services\Report\ReportServiceInterface',
            'App\Services\Report\ReportService'
        );

    }
}
