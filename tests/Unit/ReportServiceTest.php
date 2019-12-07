<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testCanGetChartDataFromReportService()
    {

        $this->mock(\App\Repositories\OnboardingFlow\OnboardingFlowRepositoryInterface::class, function ($mock) {
            $mock->shouldReceive('fetchAllDataOnboarding')->andReturn([
                [
                    'user_id' => '3121',
                    'created_at' => '2016-07-19',
                    'onboarding_perentage' => '40',
                    'count_applications' => '0',
                    'count_accepted_applications' => '0'
                ]
            ]);
            $reportService = new \App\Services\Report\ReportService($mock);
            $chartData = $reportService->getChartsData();
            $this->assertEquals(count($chartData), 1);
        });


    }

}
