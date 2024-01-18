<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
         'name' => 'admin',
         'lastname' => '',
         'specialty' => 'Pediatría',
         'phone' => 1234567890,
         'medical_registry' => 'RM-12345/12',
         'email' => 'admin@nemesis.com',
         'password' => Hash::make('admin')
        ]);

        $admin->assignRole('admin');

        $doctor = User::create([
            'name' => 'doctor',
            'lastname' => '',
            'specialty' => 'Pediatría',
            'phone' => 1234567890,
            'medical_registry' => 'RM-12345/12',
            'email' => 'doctor@nemesis.com',
            'password' => Hash::make('doctor')
        ]);

        $doctor->assignRole('doctor');
    }
}
