<?php
/**
 * Created by PhpStorm.
 * User: babakfaghihian
 * Date: 12/7/2019 AD
 * Time: 21:35
 */

namespace App\Services\Report;


use App\Repositories\OnboardingFlow\OnboardingFlowRepositoryInterface;

class ReportService implements ReportServiceInterface
{
    private $onBoardingFlowRepository;

    public function __construct(OnboardingFlowRepositoryInterface $onboardingFlowService)
    {
        $this->onBoardingFlowRepository = $onboardingFlowService;
    }

    public function getChartsData()
    {
       return [
           [
               'user_id' => '3121',
               'created_at' => '2016-07-19',
               'onboarding_perentage' => '40',
               'count_applications' => '0',
               'count_accepted_applications' => '0'
           ]
       ];
    }
}
