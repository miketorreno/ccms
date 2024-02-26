<?php

namespace Database\Seeders;

use App\Models\CourtCase;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourtCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CourtCase::factory(10)->create([
        //     'case_status' => fake()->randomElement(['Pre-filling', 'Pending', 'Trial']),
        //     'lawyer_id' => 4,
        //     'court_id' => rand(1, 3),
        // ]);
        // DB::table('courts')->insert([
        //     'case_number' => ,
        //     'title' => ,
        //     'case_type' => ,
        //     'case_status' => fake()->randomElement(['Pre-filling', 'Pending', 'Trial']),
        //     'cause_of_action' => ,
        //     'case_details' => ,
        //     'court_id' => 1,
        //     'clerk_id' => 1,
        //     'lawyer_id' => 4,
        //     'start_date' => date('Y-m-d H:i:s'),
        //     'app_date' => ,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);
    }
}
