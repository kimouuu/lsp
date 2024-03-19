<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'level' => 'admin',
        ]);

        User::create([
            'email' => 'pemilik@mail.com',
            'password' => bcrypt('password'),
            'level' => 'pemilik',
        ]);

        User::create([
            'email' => 'operator@mail.com',
            'password' => bcrypt('password'),
            'level' => 'operator',
        ]);

        User::create([
            'email' => 'mila@mail.com',
            'password' => bcrypt('password'),
            'level' => 'pelanggan',
        ]);
    }
}
