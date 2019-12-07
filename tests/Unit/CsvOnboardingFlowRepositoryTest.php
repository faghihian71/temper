<?php

namespace Tests\Unit;

use App\Repositories\OnboardingFlow\CsvOnboardingFlowRepository;
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

        $csvRepository = new CsvOnboardingFlowRepository();

        $testFilePath = public_path() . '/csv/temper_data.csv';
        $csvRepository->setCsvPath($testFilePath);
        $result = $csvRepository->fetchAllDataOnboarding();

        $this->assertIsArray($result);
        $this->assertEquals(count($result), 339);


    }

}
