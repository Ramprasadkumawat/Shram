<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Check if admin user already exists
        $existingAdmin = User::where('email', 'admin@shram.com')->first();
        
        if ($existingAdmin) {
            $this->command->info('Admin user already exists!');
            return;
        }

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'age' => 30,
            'mobile_number' => '1234567890',
            'aadhar_number' => '123456789012',
            'email' => 'admin@shram.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'type' => 'owner', // This makes the user an admin
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@shram.com');
        $this->command->info('Password: admin123');
    }
}
