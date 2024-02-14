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
        Party::factory(10)->create([
            'court_case_id' => CourtCase::factory()
        ]);
    }
}
