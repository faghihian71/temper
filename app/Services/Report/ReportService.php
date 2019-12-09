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



        $onboardingData = $this->onBoardingFlowRepository->fetchAllDataOnboarding();

        var_dump($onboardingData);
        die();

        $firstWeek = strtotime($onboardingData[0]['created_at']);
        var_dump(\DateTime::createFromFormat('Y-m-d',$firstWeek ));
        die();

        foreach ($onboardingData as $data)
        {
            if($firstWeek != $data['created_at'])
            {

            }


        }
    }
}
