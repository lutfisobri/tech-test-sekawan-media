<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Toyota Corolla',
                'fuel_consumption' => 10,
                'status' => 'available',
                'type' => 'person',
                'last_service' => '2024-09-09',
                'next_service' => '2024-10-10',
            ],
            [
                'name' => 'Toyota Hilux',
                'fuel_consumption' => 15,
                'status' => 'available',
                'type' => 'item',
                'last_service' => '2024-09-09',
                'next_service' => '2024-10-10',
            ],
            [
                'name' => 'Toyota Fortuner',
                'fuel_consumption' => 12,
                'status' => 'available',
                'type' => 'person',
                'last_service' => '2024-09-09',
                'next_service' => '2024-10-10',
            ],
        ];

        foreach ($items as $item) {
            Vehicle::create($item);
        }
    }
}