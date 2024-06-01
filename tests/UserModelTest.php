<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCreation()
    {
        // Create a new user instance
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Verify the user attributes
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('testuser@example.com', $user->email);
        $this->assertTrue(\Hash::check('password123', $user->password));
    }

    public function testHiddenAttributes()
    {
        // Create a new user instance
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Convert the user to an array
        $userArray = $user->toArray();

        // Verify the hidden attributes are not in the array
        $this->assertArrayNotHasKey('password', $userArray);
        $this->assertArrayNotHasKey('remember_token', $userArray);
        $this->assertArrayNotHasKey('two_factor_recovery_codes', $userArray);
        $this->assertArrayNotHasKey('two_factor_secret', $userArray);
    }

    public function testAppendedAttributes()
    {
        // Create a new user instance
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Convert the user to an array
        $userArray = $user->toArray();

        // Verify the appended attributes are in the array
        $this->assertArrayHasKey('profile_photo_url', $userArray);
    }

    public function testAttributeCasting()
    {
        // Create a new user instance
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => now(),
        ]);

        // Verify the attribute casting
        $this->assertInstanceOf(\DateTime::class, $user->email_verified_at);
        $this->assertTrue(\Hash::check('password123', $user->password));
    }
}
