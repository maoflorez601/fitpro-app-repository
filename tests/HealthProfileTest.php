<?php

namespace Tests\Unit;

use App\Models\HealthProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HealthProfileTest extends TestCase
{
    use RefreshDatabase;

    public function testHealthProfileCreation()
    {
        // Create a new HealthProfile instance
        $healthProfile = HealthProfile::factory()->create([
            'pathology_group' => 'Cardiovascular',
            'pathology' => 'Hypertension',
            'hearth_rate' => 75,
            'systole' => 120,
            'diastole' => 80,
            'blood_oxygen' => 98,
            'blood_glucose' => 90,
        ]);

        // Verify the health profile attributes
        $this->assertInstanceOf(HealthProfile::class, $healthProfile);
        $this->assertEquals('Cardiovascular', $healthProfile->pathology_group);
        $this->assertEquals('Hypertension', $healthProfile->pathology);
        $this->assertEquals(75, $healthProfile->hearth_rate);
        $this->assertEquals(120, $healthProfile->systole);
        $this->assertEquals(80, $healthProfile->diastole);
        $this->assertEquals(98, $healthProfile->blood_oxygen);
        $this->assertEquals(90, $healthProfile->blood_glucose);
    }

    public function testMassAssignmentProtection()
    {
        // Create a new HealthProfile instance with mass assignment
        $healthProfile = new HealthProfile([
            'pathology_group' => 'Respiratory',
            'pathology' => 'Asthma',
            'hearth_rate' => 85,
            'systole' => 130,
            'diastole' => 85,
            'blood_oxygen' => 95,
            'blood_glucose' => 100,
        ]);

        $healthProfile->save();

        // Verify the health profile attributes
        $this->assertEquals('Respiratory', $healthProfile->pathology_group);
        $this->assertEquals('Asthma', $healthProfile->pathology);
        $this->assertEquals(85, $healthProfile->hearth_rate);
        $this->assertEquals(130, $healthProfile->systole);
        $this->assertEquals(85, $healthProfile->diastole);
        $this->assertEquals(95, $healthProfile->blood_oxygen);
        $this->assertEquals(100, $healthProfile->blood_glucose);
    }
}
