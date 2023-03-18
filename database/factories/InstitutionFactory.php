<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Institution>
 */
class InstitutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'institution_name' => $this->faker->name,
            'institution_address' => $this->faker->address,
            'institution_phone' => $this->faker->numerify('965######'),
            'institution_web_page' => $this->faker->address,
            'institution_logo' => $this->faker->name,
            'ubigeo_id' => $this->faker->numerify('1#')
        ];
    }
}
