<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Court;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Court::factory(10)->create([
        //     'judge_id' => User::factory()
        // ]);
        DB::table('courts')->insert([
            'judge_id' => 3,
            'name' => "1ኛ የመጀመሪያ ችሎት",
            'city' => "አዲስ አበባ",
            'state' => "አዲስ አበባ",
            'zip_code' => fake()->postcode(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('courts')->insert([
            'judge_id' => 5,
            'name' => "2ኛ የመጀመሪያ ችሎት",
            'city' => "አዲስ አበባ",
            'state' => "አዲስ አበባ",
            'zip_code' => fake()->postcode(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('courts')->insert([
            'judge_id' => 6,
            'name' => "1ኛ ይግባኝ ችሎት",
            'city' => "አዲስ አበባ",
            'state' => "አዲስ አበባ",
            'zip_code' => fake()->postcode(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
