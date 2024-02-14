<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_users')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
        DB::table('role_users')->insert([
            'user_id' => 2,
            'role_id' => 2,
        ]);
        DB::table('role_users')->insert([
            'user_id' => 3,
            'role_id' => 3,
        ]);
        DB::table('role_users')->insert([
            'user_id' => 4,
            'role_id' => 4,
        ]);
    }
}
