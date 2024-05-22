<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Facades\SettingUtil;
use App\Models\Owner;
use Illuminate\Database\Seeder;

use App\Models\Setting;
use App\Models\User;

class SettingsSeeder extends Seeder
{
    public function __construct(
        public User $user
    ) { }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->setUsername('superadmin')
            ->hasAttached([
                Setting::factory()->create(SettingUtil::getDefaults()['authorizations']),
            ])
            ->hasAttached([
                Setting::factory()->create(SettingUtil::getDefaults()['notifications'])
            ])
            ->create([
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
            ]);
    }
}
