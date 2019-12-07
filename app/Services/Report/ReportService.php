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
        // TODO: Implement getChartsData() method.
    }
}
