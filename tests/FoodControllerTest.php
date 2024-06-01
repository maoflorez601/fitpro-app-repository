<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Models\Food;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FoodControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test index method of FoodController.
     *
     * @return void
     */
    public function testIndex()
    {
        // Create test data
        Food::factory()->count(3)->create();

        // Call the index route
        $response = $this->get(route('foods.index'));

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the view is returned
        $response->assertViewIs('foods.index');

        // Assert that the 'foods' variable is passed to the view
        $response->assertViewHas('foods');
    }
}
