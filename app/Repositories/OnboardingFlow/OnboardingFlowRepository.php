<?php
/**
 * Created by PhpStorm.
 * User: babakfaghihian
 * Date: 12/7/2019 AD
 * Time: 22:03
 */

namespace App\Repositories\OnboardingFlow;


use App\Library\Csv\CsvLoader;
use App\Library\DataLoader\DataLoaderInterface;

class OnboardingFlowRepository implements OnboardingFlowRepositoryInterface
{

    private $dataLoader;

    public function __construct(DataLoaderInterface $dataLoader)
    {
        $this->dataLoader = $dataLoader;
    }



    public function fetchAllDataOnboarding()
    {
        // Use Csv Loader
        $dataLoader = $this->dataLoader;
        $dataRecords =  $dataLoader->fetchAllData();
        return $dataRecords;
    }




}
