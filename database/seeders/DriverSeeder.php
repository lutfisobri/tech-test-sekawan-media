<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Driver 1',
                'phone' => '081234567890',
            ],
            [
                'name' => 'Driver 2',
                'phone' => '081234567891',
            ],
            [
                'name' => 'Driver 3',
                'phone' => '081234567892',
            ],
        ];

        foreach ($items as $item) {
            \App\Models\Driver::create($item);
        }
    }
}
