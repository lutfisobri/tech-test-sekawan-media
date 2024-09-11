<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = (object) [
            'booking' => (object) [
                'total' => Booking::count(),
                'approved' => Booking::where('status', 'approved')->count(),
                'rejected' => Booking::where('status', 'rejected')->count(),
                'pending' => Booking::where('status', 'pending')->count(),
            ],

            'vehicle' => (object) [
                'total' => Vehicle::count(),
                'available' => Vehicle::where('status', 'available')->count(),
                'in_use' => Vehicle::where('status', 'in_use')->count(),
                'maintenance' => Vehicle::where('status', 'maintenance')->count(),
            ],

            'driver' => (object) [
                'total' => Driver::count(),
                'available' => Driver::where('status', 'available')->count(),
                'unavailable' => Driver::where('status', 'unavailable')->count(),
            ],
            
            'vehicle_per_month' => $this->vehiclePerMonth(),
            'top_vehicle' => $this->topVehiclePerMonth(),
        ];

        return view('pages.dashboard', compact('data'));
    }

    private function vehiclePerMonth()
    {
        $data = [];

        for ($i = 0; $i < 12; $i++) {
            $data[] = Booking::with('vehicle')
                ->where('status', 'approved')
                ->whereMonth('start_date', $i + 1)
                ->count();
        }

        return $data;
    }

    private function topVehiclePerMonth()
    {
        $data = [];

        for ($i = 0; $i < 12; $i++) {
            $tmp = Booking::with('vehicle')
                ->where('status', 'approved')
                ->whereMonth('start_date', $i + 1)
                ->groupBy('vehicle_id')
                ->selectRaw('count(*) as total, vehicle_id')
                ->orderByDesc('total')
                ->first();
            
            if (!$tmp) {
                continue;
            }

            $month = date('F', mktime(0, 0, 0, $i + 1, 10));
            $tmp->month = $month;

            $data[] = $tmp;
        }

        if (count($data) > 4) {
            $data = array_slice($data, 0, 4);
        }

        usort($data, function ($a, $b) {
            return $b->total - $a->total;
        });

        return (object) $data;
    }

    public function statistic()
    {
        $data = (object) [
            'vehicle_per_month' => $this->vehiclePerMonth(),
            'top_vehicle' => $this->topVehiclePerMonth(),
        ];

        return compact('data');
    }
}
