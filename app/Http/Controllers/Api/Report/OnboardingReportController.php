<?php

namespace App\Http\Controllers\Api\Report;

use App\Http\Controllers\Controller;
use App\Services\Report\ReportServiceInterface;
use Illuminate\Http\Request;

class OnboardingReportController extends Controller
{
    private $reportService;

    public function __construct(ReportServiceInterface $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index()
    {

        $chartData = $this->reportService->getChartsData();
        return response()->json([
            $chartData
        ]);

    }
}
