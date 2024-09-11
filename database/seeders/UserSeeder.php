<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'approval 1',
                'email' => 'approval1@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'approver',
            ],
            [
                'name' => 'approval 2',
                'email' => 'approval2@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'approver',
            ],
        ];

        foreach ($items as $item) {
            User::create($item);
        }
    }
}
