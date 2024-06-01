<?php

namespace Tests\Feature;

use App\Actions\Fortify\ResetUserPassword;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Mockery;

class ResetUserPasswordTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testResetUserPassword()
    {
        $user = Mockery::mock(AuthUser::class)->makePartial();
        $user->shouldReceive('save')->once();

        $input = [
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ];

        Hash::shouldReceive('make')->once()->with('new-password')->andReturn('hashed-new-password');

        $action = new ResetUserPassword();

        $action->reset($user, $input);

        $this->assertEquals('hashed-new-password', $user->password);
    }

    public function testResetUserPasswordValidationFails()
    {
        $this->expectException(ValidationException::class);

        $user = Mockery::mock(AuthUser::class)->makePartial();

        $input = [
            'password' => 'short',
            'password_confirmation' => 'short',
        ];

        $action = new ResetUserPassword();

        $action->reset($user, $input);
    }
}
