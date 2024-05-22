<?php

namespace Database\Seeders\Tests;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserBasic extends Seeder
{
    public static string $email = 'test@example.com';

    public static string $password = 'password';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            // 'username' => 'testuser', // Add this line to the factory method in 'UserFactory.php
            'email' => self::$email,
            'password' => Hash::make(self::$password)
        ]);
    }
}
