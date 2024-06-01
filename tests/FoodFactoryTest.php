<?php

namespace Tests\Factories;

use Database\Factories\FoodFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FoodFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Food Factory
     *
     * @return void
     */
    public function testFoodFactory()
    {
        // Create a food using the factory
        $food = FoodFactory::new()->create();

        // Assert the food instance is of the correct class
        $this->assertInstanceOf(\App\Models\Food::class, $food);
    }
}
