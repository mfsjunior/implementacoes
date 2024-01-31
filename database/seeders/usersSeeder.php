<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([          
            'firstname' => 'Milton ',
            'lastname' => 'Junior',
            'email' => 'miltonfsjunior@gmail.com',
            'password' => bcrypt('12345678'),

        ]);

    }
}
