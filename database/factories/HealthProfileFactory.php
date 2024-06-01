<?php

namespace Database\Factories;

use App\Models\HealthProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class HealthProfileFactory extends Factory
{
    protected $model = HealthProfile::class;

    public function definition()
    {
        return [
            'pathology_group' => $this->faker->word,
            'pathology' => $this->faker->word,
            'hearth_rate' => $this->faker->numberBetween(60, 100),
            'systole' => $this->faker->numberBetween(110, 140),
            'diastole' => $this->faker->numberBetween(70, 90),
            'blood_oxygen' => $this->faker->numberBetween(90, 100),
            'blood_glucose' => $this->faker->numberBetween(70, 140),
        ];
    }
}
