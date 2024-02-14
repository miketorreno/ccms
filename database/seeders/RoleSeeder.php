<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => "Court Clerk",
            'slug' => "clerk",
            'permissions' => '{"platform.index":"0","platform.systems.clerk":"1","platform.systems.judge":"0","platform.systems.roles":"0","platform.systems.users":"0","platform.systems.client":"0","platform.systems.lawyer":"0","platform.systems.attachment":"0"}',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('roles')->insert([
            'name' => "Client",
            'slug' => "client",
            'permissions' => '{"platform.index":"0","platform.systems.clerk":"0","platform.systems.judge":"0","platform.systems.roles":"0","platform.systems.users":"0","platform.systems.client":"1","platform.systems.lawyer":"0","platform.systems.attachment":"0"}',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('roles')->insert([
            'name' => "Judge",
            'slug' => "judge",
            'permissions' => '{"platform.index":"0","platform.systems.clerk":"0","platform.systems.judge":"1","platform.systems.roles":"0","platform.systems.users":"0","platform.systems.client":"0","platform.systems.lawyer":"0","platform.systems.attachment":"0"}',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('roles')->insert([
            'name' => "Lawyer",
            'slug' => "lawyer",
            'permissions' => '{"platform.index":"0","platform.systems.clerk":"0","platform.systems.judge":"0","platform.systems.roles":"0","platform.systems.users":"0","platform.systems.client":"0","platform.systems.lawyer":"1","platform.systems.attachment":"0"}',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
