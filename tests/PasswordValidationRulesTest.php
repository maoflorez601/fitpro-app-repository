<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Validation\Rules\Password;
use App\Actions\Fortify\PasswordValidationRules;

class PasswordValidationRulesTest extends TestCase
{
    /**
     * A class that uses the PasswordValidationRules trait.
     */
    use PasswordValidationRules;

    /**
     * Test passwordRules method.
     *
     * @return void
     */
    public function testPasswordRules()
    {
        // Expected rules
        $expected = [
            'required',
            'string',
            Password::default(),
            'confirmed',
        ];

        // Get the rules from the method
        $rules = $this->passwordRules();

        // Assert the rules match the expected rules
        $this->assertEquals($expected, $rules);
    }
}