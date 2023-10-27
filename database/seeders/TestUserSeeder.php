<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => Hash::make(env('USER_PASSWORD_TEST')),
            'email_verified_at' => now(),
        ]);
    }
}
