<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ic = $this->faker->unique()->randomNumber(9, true).$this->faker->unique()->randomNumber(3, true);

        return [
            'name' => $this->faker->name,
            'ic' => $ic,
            'email' => $this->faker->unique()->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
