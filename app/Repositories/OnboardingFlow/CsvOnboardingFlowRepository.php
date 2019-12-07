<?php
/**
 * Created by PhpStorm.
 * User: babakfaghihian
 * Date: 12/7/2019 AD
 * Time: 22:03
 */

namespace App\Repositories\OnboardingFlow;


use App\Library\Csv\CsvLoader;

class CsvOnboardingFlowRepository implements OnboardingFlowRepositoryInterface
{

    private $csvPath;

    public function setCsvPath($csvPath)
    {
        $this->csvPath = $csvPath;
    }

    public function getCsvPath(){
        return $this->csvPath;
    }


    public function fetchAllDataOnboarding()
    {
        // Use Csv Loader
        $csvReader = new CsvLoader($this->csvPath);
        $csvDataRows =  $csvReader->fetchCsvData();
        return $csvDataRows;
    }




}
