<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'nom' => 'BahAdmin',
                'prenom' => 'BintaAdmin',
                'email' => 'Bintadmin@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => true,

            ]
        );
    }
}
