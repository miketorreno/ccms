<?php

namespace Database\Factories;

use App\Models\CourtCase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Party>
 */
class PartyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'court_case_id' => CourtCase::factory(),
            'name' => fake()->name(),
            'address' => fake()->address(),
            'national_id' => rand(1111111, 9999999),
            'military_id' => rand(1111111, 9999999),
            'education' => fake()->name(),
            'marriage' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'attorney' => fake()->title() . fake()->name(),
            'party_type' => fake()->randomElement(['Plaintiff', 'Defendant', 'Witness']),
        ];
    }
}
