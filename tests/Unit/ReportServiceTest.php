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


    // Test Valid Result For on week cohort
    public function testCheckOnboardingChartDataForweek(){


        $this->mock(\App\Repositories\OnboardingFlow\OnboardingFlowRepositoryInterface::class, function ($mock) {
            $mock->shouldReceive('fetchAllDataOnboarding')->andReturn([
                [
                    'user_id' => '3121',
                    'created_at' => '2016-07-19',
                    'onboarding_perentage' => '40',
                    'count_applications' => '0',
                    'count_accepted_applications' => '0'
                ],
                [
                    'user_id' => '3122',
                    'created_at' => '2016-07-19',
                    'onboarding_perentage' => '40',
                    'count_applications' => '0',
                    'count_accepted_applications' => '0'
                ],
                [
                    'user_id' => '3123',
                    'created_at' => '2016-07-19',
                    'onboarding_perentage' => '100',
                    'count_applications' => '0',
                    'count_accepted_applications' => '0'
                ],
                [
                    'user_id' => '3124',
                    'created_at' => '2016-07-20',
                    'onboarding_perentage' => '90',
                    'count_applications' => '0',
                    'count_accepted_applications' => '0'
                ]
            ]);


            $reportService = new \App\Services\Report\ReportService($mock);
            $chartData = $reportService->getChartsData();


            //start day of week
            $dataToEqual = ['2019-07-19'=>
                [
                    '0'=>'4',
                    '20'=>'4',
                    '40'=>'4',
                    '90'=>'2',
                    '100'=>'1'
                ]
            ];

            $this->assertEquals($chartData , $dataToEqual);


        });
    }


    // Test Data has loaded into service by repository or not
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
            $this->assertArrayHasKey('2016-07-19', $chartData);
        });


    }




}
