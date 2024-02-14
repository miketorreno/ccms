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
        CourtCase::factory(10)->create();
    }
}
