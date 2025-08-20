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
        User::truncate();
        
        $adminUsers = [
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'age' => 35,
                'mobile_number' => '9876543210',
                'aadhar_number' => '111111111111',
                'email' => 'superadmin@shram.com',
                'password' => 'superadmin123',
                'type' => 'admin',
            ],
            [
                'first_name' => 'John',
                'last_name' => 'Manager',
                'age' => 32,
                'mobile_number' => '9876543211',
                'aadhar_number' => '222222222222',
                'email' => 'john.manager@shram.com',
                'password' => 'john123',
                'type' => 'admin',
            ],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Director',
                'age' => 28,
                'mobile_number' => '9876543212',
                'aadhar_number' => '333333333333',
                'email' => 'sarah.director@shram.com',
                'password' => 'sarah123',
                'type' => 'admin',
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Coordinator',
                'age' => 40,
                'mobile_number' => '9876543213',
                'aadhar_number' => '444444444444',
                'email' => 'michael.coordinator@shram.com',
                'password' => 'michael123',
                'type' => 'admin',
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Supervisor',
                'age' => 29,
                'mobile_number' => '9876543214',
                'aadhar_number' => '555555555555',
                'email' => 'emily.supervisor@shram.com',
                'password' => 'emily123',
                'type' => 'admin',
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Controller',
                'age' => 45,
                'mobile_number' => '9876543215',
                'aadhar_number' => '666666666666',
                'email' => 'david.controller@shram.com',
                'password' => 'david123',
                'type' => 'admin',
            ],
            [
                'first_name' => 'Lisa',
                'last_name' => 'Administrator',
                'age' => 31,
                'mobile_number' => '9876543216',
                'aadhar_number' => '777777777777',
                'email' => 'lisa.administrator@shram.com',
                'password' => 'lisa123',
                'type' => 'admin',
            ],
            [
                'first_name' => 'Robert',
                'last_name' => 'Executive',
                'age' => 38,
                'mobile_number' => '9876543217',
                'aadhar_number' => '888888888888',
                'email' => 'robert.executive@shram.com',
                'password' => 'robert123',
                'type' => 'admin',
            ],
            [
                'first_name' => 'Jennifer',
                'last_name' => 'Coordinator',
                'age' => 27,
                'mobile_number' => '9876543218',
                'aadhar_number' => '999999999999',
                'email' => 'jennifer.coordinator@shram.com',
                'password' => 'jennifer123',
                'type' => 'admin',
            ],
            [
                'first_name' => 'William',
                'last_name' => 'Manager',
                'age' => 42,
                'mobile_number' => '9876543219',
                'aadhar_number' => '101010101010',
                'email' => 'william.manager@shram.com',
                'password' => 'william123',
                'type' => 'admin',
            ],
        ];

        $createdCount = 0;

        foreach ($adminUsers as $adminData) {
            // Check if admin user already exists
            $existingAdmin = User::where('email', $adminData['email'])->first();
            
            if (!$existingAdmin) {
                User::create([
                    'first_name' => $adminData['first_name'],
                    'last_name' => $adminData['last_name'],
                    'age' => $adminData['age'],
                    'mobile_number' => $adminData['mobile_number'],
                    'aadhar_number' => $adminData['aadhar_number'],
                    'email' => $adminData['email'],
                    'email_verified_at' => now(),
                    'password' => Hash::make($adminData['password']),
                    'type' => 'admin',// This makes the user an admin
                ]);

                $this->command->info("Admin user created: {$adminData['email']} / {$adminData['password']}");
                $createdCount++;
            } else {
                $this->command->info("Admin user already exists: {$adminData['email']}");
            }
        }

        $this->command->info("Total admin users created: {$createdCount}");
        $this->command->info('All admin users have type: admin');
    }
}
