<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Court;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourtCase>
 */
class CourtCaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'case_number' => rand(1111, 9999),
            'title' => fake()->word(),
            'case_type' => fake()->randomElement(['Civil', 'Criminal']),
            // 'case_status' => fake()->word(),
            'cause_of_action' => fake()->sentence(),
            'case_details' => fake()->paragraph(),
            'court_id' => Court::factory(),
            'clerk_id' => User::factory(),
            'lawyer_id' => User::factory(),
            'start_date' => date('Y-m-d H:i:s'),
            'app_date' => date('Y-m-d H:i:s'),
        ];
    }
}
