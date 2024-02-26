<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "ሻምበል ዋሲሁን ጥላሁን",
            'email' => 'clerk@ccms.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => fake()->name(),
            'email' => 'client@ccms.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => "ኮ/ል ተመስገን መንግስቱ",
            'email' => 'judge@ccms.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => "ሻለቃ ከበደ ባልቻ",
            'email' => 'lawyer@ccms.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => "ሻለቃ ተስፋዬ ታደሰ",
            'email' => 'judge2@ccms.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => "ሌ/ኮ ብሩክ መስፍን",
            'email' => 'judge3@ccms.com',
            'password' => Hash::make('password')
        ]);
    }
}
