<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\owner>
 */
class ownerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->firstName,
            'surname'=>fake()->lastName,
            'phone'=>'370 678 5321',
            'email'=>fake()->email,
            'address'=>fake()->address
        ];
    }
}
