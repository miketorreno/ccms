<?php

namespace Database\Seeders;

use App\Models\Party;
use App\Models\CourtCase;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Party::factory(5)->create([
            'court_case_id' => rand(1, 10)
        ]);
    }
}
