<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Penumpang',
                'email' => 'penumpang@gmail.com',
                'role' => 'penumpang',
                'password' => bcrypt('12345')
            ],
        ];

        foreach ($userData as $key =>$val){
            User::create($val);
        }
    }
}
