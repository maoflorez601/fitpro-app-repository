<?php

namespace Tests\Feature;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testDeleteUser()
    {
        // Create a mock for the User model
        $user = Mockery::mock(User::class)->makePartial();

        // Expect deleteProfilePhoto method to be called once
        $user->shouldReceive('deleteProfilePhoto')->once();

        // Mock the tokens relationship and the delete method on each token
        $token1 = Mockery::mock();
        $token1->shouldReceive('delete')->once();

        $token2 = Mockery::mock();
        $token2->shouldReceive('delete')->once();

        $user->tokens = collect([$token1, $token2]);

        // Expect the delete method to be called once on the user model
        $user->shouldReceive('delete')->once();

        // Create an instance of the action
        $action = new DeleteUser();

        // Call the delete method on the action
        $action->delete($user);

        // Assertions to make sure expectations were met
        $this->assertTrue(true);
    }
}
