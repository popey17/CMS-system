<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'customer_id' => $this->faker->unique()->numberBetween(001, 100),
            'store_id' => $this->faker->numberBetween(1, 2),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'birthday' => $birthday = $this->faker->dateTimeBetween('-100 years', '-18 years'),
            'gurdian_phone' => fake()->phoneNumber(),
            'created_date' => fake()->date(),
            'age' => $birthday->diff(new \DateTime())->y,
        ];
    }
}
