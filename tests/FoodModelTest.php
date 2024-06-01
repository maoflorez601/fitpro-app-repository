<?php

namespace Tests\Unit;

use App\Models\Food;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FoodModelTest extends TestCase
{
    use RefreshDatabase;

    public function testFoodCreation()
    {
        // Create a new Food instance
        $food = Food::factory()->create([
            'name' => 'Apple',
            'category' => 'Fruit',
            'protein' => 0.3,
            'carbs' => 14.0,
            'fat' => 0.2,
        ]);

        // Verify the food attributes
        $this->assertInstanceOf(Food::class, $food);
        $this->assertEquals('Apple', $food->name);
        $this->assertEquals('Fruit', $food->category);
        $this->assertEquals(0.3, $food->protein);
        $this->assertEquals(14.0, $food->carbs);
        $this->assertEquals(0.2, $food->fat);
    }

    public function testMassAssignmentProtection()
    {
        // Create a new Food instance with mass assignment
        $food = new Food([
            'name' => 'Banana',
            'category' => 'Fruit',
            'protein' => 1.1,
            'carbs' => 23.0,
            'fat' => 0.3,
        ]);

        $food->save();

        // Verify the food attributes
        $this->assertEquals('Banana', $food->name);
        $this->assertEquals('Fruit', $food->category);
        $this->assertEquals(1.1, $food->protein);
        $this->assertEquals(23.0, $food->carbs);
        $this->assertEquals(0.3, $food->fat);
    }
}
