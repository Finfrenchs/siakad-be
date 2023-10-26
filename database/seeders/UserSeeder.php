<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(50)->create();

        User::create([
            'name' => 'Kelvin Admin',
            'email' => 'kelvin@fic8.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'roles' => 'admin',
        ]);

        User::create([
            'name' => 'M Kelvin MF',
            'email' => 'kelvin.mhs@lwk.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'roles' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'M Kelvin Madrianto Fahendra',
            'email' => 'kelvin.dos@lwk.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'roles' => 'dosen',
        ]);
    }
}
