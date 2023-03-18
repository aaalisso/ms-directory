<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Institution_Person>
 */
class Institution_PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'institution_id' => $this->faker->numerify('1#'),
            'person_id' => $this->faker->numerify('1#'),
            'occupation' => $this->faker->name,
            'institutional_email' => $this->faker->email,
            'incorporation_date' => $this->faker->numerify('200#-12-1#')
        ];
    }
}
