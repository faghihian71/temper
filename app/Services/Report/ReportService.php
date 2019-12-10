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

    private function sumArrayValues($inputArray)
    {
        $sum = 0;
        foreach ($inputArray as $key=>$value) {

            $sum += $value;

        }
        return $sum;
    }

    private function getChartsDataByDates(&$onboardingData) : array{

        $stringDate = $onboardingData[0]['created_at'];
        $currentDateObject = \DateTime::createFromFormat('Y-m-d', $stringDate);

        $resultArray = [];
        $currentTimeString = $currentDateObject->format('Y-m-d');
        $resultArray[$currentTimeString] = [];
        $resultArray[$currentTimeString][0] = 0;



        foreach ($onboardingData as $row) {

            $rowDate = \DateTime::createFromFormat('Y-m-d', $row['created_at']);
            $diffDays = $rowDate->diff($currentDateObject)->format("%d");
            if ($diffDays >= 7) {
                $currentTimeString = $rowDate->format('Y-m-d');
                $currentDateObject = $rowDate;
                $resultArray[$currentTimeString][0] = 0;
            }
            //var_dump($resultArray[$currentTimeString][$row['onboarding_perentage']]);
            if (isset($resultArray[$currentTimeString][$row['onboarding_perentage']])) {

                $resultArray[$currentTimeString][$row['onboarding_perentage']] =
                    $resultArray[$currentTimeString][$row['onboarding_perentage']] + 1;

            } else {
                $resultArray[$currentTimeString][$row['onboarding_perentage']] = 1;
            }

        }
        return $resultArray;
    }

    private function getChartsDataAcendingStepsWithCount($groupedByDateChartArray):array {

        $sortedResultArray = array();

        foreach ($groupedByDateChartArray as $date => $percentage_array)
        {

            ksort($percentage_array);

            // Sum all for minus in each step
            $total_users_count_in_cohort = $this->sumArrayValues($percentage_array);
            $last_step_users_count = 0;

            // Make name and data for highcharts
            $eachDateArray = array('name'=>$date);
            foreach($percentage_array as $step=>$count)
            {
                // In every level we should minus previous level count to make current point count
                $eachDateArray['data'][] =  array($step,($total_users_count_in_cohort - $last_step_users_count));

                //update total remained users and previous level count
                $total_users_count_in_cohort = $total_users_count_in_cohort - $last_step_users_count;
                $last_step_users_count = $count;
            }
            $sortedResultArray[] = $eachDateArray;

        }
        return $sortedResultArray;
    }

    public function getChartsData () : array
    {


        // Get Onboarding Data
        $onboardingData = $this->onBoardingFlowRepository->fetchAllDataOnboarding();

        // Group By date for our cohorts
        $groupedByDateChartArray = $this->getChartsDataByDates($onboardingData);

        // Then Group Data by asecnding steps
        $sortedResultArray = $this->getChartsDataAcendingStepsWithCount($groupedByDateChartArray);

        return $sortedResultArray;


    }
}
