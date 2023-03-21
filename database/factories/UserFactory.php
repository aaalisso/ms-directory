<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => 'aldo@gmail.com',
            'password' => '$2y$10$0KfXiYgqloZ/3RXRfgBXrOMF9Ri9MsOSReP6uHuuoHR0OvjBLablG', // password
            'person_id' => '1'
        ];
    }
}
