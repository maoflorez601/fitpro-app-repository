<?php

namespace Tests\Feature;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;
use Tests\TestCase;

class CreateNewUserTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Test that a new user can be created successfully.
     *
     * @return void
     */
    public function testCreateNewUser()
    {
        $input = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => 'accepted',
        ];

        // Mock Jetstream::hasTermsAndPrivacyPolicyFeature to return true
        $this->mock(Jetstream::class, function ($mock) {
            $mock->shouldReceive('hasTermsAndPrivacyPolicyFeature')
                 ->andReturn(true);
        });

        $action = new CreateNewUser();

        $user = $action->create($input);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('testuser@example.com', $user->email);
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    /**
     * Test validation errors when creating a new user.
     *
     * @return void
     */
    public function testCreateNewUserValidationErrors()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $input = [
            'name' => '',
            'email' => 'invalid-email',
            'password' => 'short',
            'password_confirmation' => 'short',
            'terms' => '',
        ];

        $action = new CreateNewUser();
        $action->create($input);
    }
}