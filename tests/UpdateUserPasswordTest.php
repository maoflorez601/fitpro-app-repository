<?php

namespace Tests\Unit\Actions\Fortify;

use App\Actions\Fortify\UpdateUserPassword;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UpdateUserPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_user_password_with_invalid_current_password()
    {
        // Crear un usuario
        $user = User::factory()->create([
            'password' => Hash::make('old_password'),
        ]);

        // Mock Validator
        Validator::shouldReceive('make')->once()->andReturn(
            $validator = \Mockery::mock(\Illuminate\Contracts\Validation\Validator::class)
        );

        // Mock Validator validateWithBag
        $validator->shouldReceive('validateWithBag')->once();

        // Mock Validator fails
        $validator->shouldReceive('fails')->once()->andReturn(true);

        // Esperar ValidationException
        $this->expectException(ValidationException::class);

        // Realizar la actualización con una contraseña actual incorrecta
        $updateUserPasswordAction = new UpdateUserPassword();
        $updateUserPasswordAction->update($user, [
            'current_password' => 'contraseña_incorrecta', // Esto debería ser una contraseña incorrecta
            'password' => 'nueva_contraseña',
            'password_confirmation' => 'nueva_contraseña',
        ]);
    }
}