<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Models\HealthProfile;
use App\Http\Controllers\HealthProfileController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class HealthProfileControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test store method of HealthProfileController.
     *
     * @return void
     */
    public function testStore()
    {
        // Create fake data
        $data = [
            'pathology_group' => $this->faker->word,
            'pathology' => $this->faker->word,
            'hearth_rate' => $this->faker->randomNumber(),
            'systole' => $this->faker->randomNumber(),
            'diastole' => $this->faker->randomNumber(),
            'blood_oxygen' => $this->faker->randomNumber(),
            'blood_glucose' => $this->faker->randomNumber(),
        ];

        // Instantiate HealthProfileController
        $controller = new HealthProfileController();

        // Mock the Request object
        $request = $this->getMockBuilder('Illuminate\Http\Request')->getMock();
        $request->expects($this->once())->method('all')->willReturn($data);

        // Call the store method
        $response = $controller->store($request);

        // Assert that the response is an instance of RedirectResponse
        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);

        // Assert that the redirect route matches the expected route
        $this->assertEquals(route('healthProfiles.index'), $response->getTargetUrl());

    }
}
