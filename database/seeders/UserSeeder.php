<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Date;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '1',
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'id' => '2',
            'name' => 'Fajar Rivaldi Chan',
            'email' => 'fajarrivaldi2015@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'student_identity_number' => 123456,
            'hobby' => 'Judi Online',
            'class' => 'XII',
            'major' => 'IPA',
            'birth_date' => Date::now()
        ]);
    }
}
