<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        
        return view('pages.vehicle.list', compact('vehicles'));
    }

    public function create()
    {
        $data = (object) [
            'action' => 'vehicle/create',
        ];

        return view('pages.vehicle.form', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'fuel_consumption' => 'required',
            'status' => 'required',
            'type' => 'required',
            'last_service' => 'required',
            'next_service' => 'required',
        ]);

        Vehicle::create($request->only('name', 'fuel_consumption', 'status', 'type', 'last_service', 'next_service'));

        Helper::addLog('added a vehicle');

        return redirect()->route('vehicle');
    }

    public function edit(Vehicle $vehicle)
    {
        $data = (object) [
            'action' => 'vehicle/edit/'. $vehicle->id,
            'vehicle' => $vehicle,
        ];

        return view('pages.vehicle.form', compact('data'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'name' => 'required',
            'fuel_consumption' => 'required',
            'status' => 'required',
            'type' => 'required',
            'last_service' => 'required',
            'next_service' => 'required',
        ]);

        $vehicle->update($request->only('name', 'fuel_consumption', 'status', 'type', 'last_service', 'next_service'));

        Helper::addLog('updated a vehicle');

        return redirect()->route('vehicle');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        Helper::addLog('deleted a vehicle');

        return redirect()->route('vehicle');
    }
}
