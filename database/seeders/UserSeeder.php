<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Email;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([

            'name' => 'Manager',
            'role_id' => 1,
            'email' => 'manager@conpany.com',
            'password' => Hash::make(value: 'secret'),

        ]);

        User::create([

            'name' => 'Examle Client',
            'role_id' => 2,
            'email' => 'client@conpany.com',
            'password' => Hash::make(value: 'secret'),

        ]);
    }
}
