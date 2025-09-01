<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Farez',
            'email' => 'farezkayzi@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'client',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Admin Utama',
            'email' => 'admin2@everpro.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}