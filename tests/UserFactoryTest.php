<?php

namespace Tests\Factories;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserFactoryTest extends TestCase
{
    use RefreshDatabase; // Esto restaurará la base de datos después de cada prueba
    use WithFaker; // Esto proporcionará métodos útiles para generar datos falsos

    /**
     * Verifica si el factory de usuarios crea un usuario correctamente.
     *
     * @return void
     */
    public function testUserFactory()
    {
        // Crea un usuario utilizando el factory
        $user = User::factory()->create();

        // Verifica que el usuario se haya creado correctamente
        $this->assertNotNull($user);
        $this->assertInstanceOf(User::class, $user);
    }
}
