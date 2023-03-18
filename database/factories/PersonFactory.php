<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'person_name' => $this->faker->name,
            'person_surname' => $this->faker->name,
            'person_email' => $this->faker->email,
            'person_identity_document' => $this->faker->numerify('72######'),
            'person_address' => $this->faker->address,
            'person_phone' => $this->faker->numerify('979######'),
            'person_web_page' => $this->faker->address,
            'person_profile_picture' => $this->faker->address,
            'person_birthday_date' => $this->faker->numerify('200#-11-1#'),
            'ubigeo_id' => $this->faker->numerify('1#')
        ];
    }
}
