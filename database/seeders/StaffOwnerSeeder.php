<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StaffOwnerSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate();

        $users = [
            [
                'first_name' => 'Ram',
                'last_name' => 'staff',
                'age' => 35,
                'mobile_number' => '9876543240',
                'aadhar_number' => '111111111190',
                'email' => 'ram.staff@shram.com',
                'password' => '12345678',
                'type' => 'staff',
            ],
            [
                'first_name' => 'Shyam',
                'last_name' => 'Staff',
                'age' => 32,
                'mobile_number' => '9876543221',
                'aadhar_number' => '222222222227',
                'email' => 'shyam.staff@shram.com',
                'password' => '12345678',
                'type' => 'staff',
            ],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Staff',
                'age' => 28,
                'mobile_number' => '9876543222',
                'aadhar_number' => '333333333326',
                'email' => 'sarah.staff@shram.com',
                'password' => '12345678',
                'type' => 'staff',
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Staff',
                'age' => 40,
                'mobile_number' => '9876543223',
                'aadhar_number' => '444444444427',
                'email' => 'michael.staff@shram.com',
                'password' => '12345678',
                'type' => 'staff',
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Owner',
                'age' => 29,
                'mobile_number' => '9876543224',
                'aadhar_number' => '555555555526',
                'email' => 'emily.owner@shram.com',
                'password' => '12345678',
                'type' => 'owner',
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Owner',
                'age' => 45,
                'mobile_number' => '9876543225',
                'aadhar_number' => '666666666625',
                'email' => 'david.owner@shram.com',
                'password' => '12345678',
                'type' => 'owner',
            ],
            [
                'first_name' => 'Lisa',
                'last_name' => 'Owner',
                'age' => 31,
                'mobile_number' => '9876543226',
                'aadhar_number' => '777777777726',
                'email' => 'lisa.owner@shram.com',
                'password' => '12345678',
                'type' => 'owner',
            ],
            [
                'first_name' => 'Robert',
                'last_name' => 'Owner',
                'age' => 38,
                'mobile_number' => '9876543227',
                'aadhar_number' => '888888888827',
                'email' => 'robert.owner@shram.com',
                'password' => '12345678',
                'type' => 'owner',
            ],
            [
                'first_name' => 'Jennifer',
                'last_name' => 'Owner',
                'age' => 27,
                'mobile_number' => '9876543228',
                'aadhar_number' => '999999999929',
                'email' => 'jennifer.owner@shram.com',
                'password' => '12345678',
                'type' => 'owner',
            ],
            [
                'first_name' => 'William',
                'last_name' => 'Owner',
                'age' => 42,
                'mobile_number' => '9876543229',
                'aadhar_number' => '101010101030',
                'email' => 'william.owner@shram.com',
                'password' => '12345678',
                'type' => 'owner',
            ],
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

        foreach ($users as $user) {
            User::updateOrCreate(
                ['aadhar_number' => $user['aadhar_number']],
                array_merge($user, [
                    'password' => Hash::make($user['password']),
                ])
            );

            $this->command->info(
                ucfirst($user['type'])." user created: {$user['email']} / {$user['password']}"
            );
        }

        $this->command->info("✅ Total users seeded: " . count($users));
    }
}
