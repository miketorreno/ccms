<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Court;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Court::factory(10)->create([
            'judge_id' => User::factory()
        ]);
    }
}
