<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{

    public function register()
    {



        $this->app->bind(
            'App\Services\Report\ReportServiceInterface',
            'App\Services\Report\ReportService'
        );

    }
}
