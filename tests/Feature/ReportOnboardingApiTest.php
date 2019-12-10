<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportOnboardingApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testOnboardingApiStatus()
    {
        $response = $this->get('/api/v1/report/onboarding');
        $response->assertStatus(200);
    }



}
