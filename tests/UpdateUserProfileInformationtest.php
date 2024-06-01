<?php

namespace Tests\Feature;

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;
use Tests\TestCase;
use Mockery;

class UpdateUserProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testUpdateUserProfileInformation()
    {
        $user = User::factory()->create([
            'name' => 'Old Name',
            'email' => 'old@example.com',
        ]);

        $input = [
            'name' => 'New Name',
            'email' => 'new@example.com',
        ];

        $action = new UpdateUserProfileInformation();

        $action->update($user, $input);

        $this->assertEquals('New Name', $user->name);
        $this->assertEquals('new@example.com', $user->email);
    }

    public function testUpdateUserProfileInformationWithEmailVerification()
    {
        $user = Mockery::mock(User::class . ', ' . MustVerifyEmail::class)->makePartial();
        $user->shouldReceive('sendEmailVerificationNotification')->once();

        $user->name = 'Old Name';
        $user->email = 'old@example.com';
        $user->shouldReceive('save')->andReturn(true);

        $input = [
            'name' => 'New Name',
            'email' => 'new@example.com',
        ];

        $action = new UpdateUserProfileInformation();

        $action->update($user, $input);

        $this->assertEquals('New Name', $user->name);
        $this->assertEquals('new@example.com', $user->email);
        $this->assertNull($user->email_verified_at);
    }

    public function testUpdateUserProfileInformationValidationFails()
    {
        $this->expectException(ValidationException::class);

        $user = User::factory()->create();

        $input = [
            'name' => '',
            'email' => 'not-an-email',
        ];

        $action = new UpdateUserProfileInformation();

        $action->update($user, $input);
    }
}
