<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Ubigeo>
 */
class UbigeoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ubigeo_country' => $this->faker->name,
            'ubigeo_department' => $this->faker->name,
            'ubigeo_municipality' => $this->faker->name,
        ];
    }
}
