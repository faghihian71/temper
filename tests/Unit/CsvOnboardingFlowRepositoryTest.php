<?php

namespace Tests\Unit;


use App\Library\DataLoader\Csv\CsvLoader;
use App\Library\DataLoader\DataLoaderInterface;
use App\Repositories\OnboardingFlow\OnboardingFlowRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CsvOnboardingFlowRepositoryTest extends TestCase
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

    public function testCanLoadDataWithCsvFileWithTemperSampleFile()
    {

        $csvLoader = new CsvLoader(public_path() . '/csv/temper_data.csv');


        //Or you can mock DataLoader Interface
        $respository = new OnboardingFlowRepository($csvLoader);

        $result = $respository->fetchAllDataOnboarding($csvLoader);

        $this->assertIsArray($result);
        $this->assertEquals(count($result), 339);


    }

}
