<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@dilg8.gov.ph'],
            [
                'name'              => 'Super Admin',
                'email'             => 'admin@dilg8.gov.ph',
                'password'          => Hash::make('Admin@1234'),
                'role'              => 'admin',
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Admin account created!');
        $this->command->info('Email:    admin@dilg8.gov.ph');
        $this->command->info('Password: Admin@1234');
    }
}