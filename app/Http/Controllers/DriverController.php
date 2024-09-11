<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('pages.driver.list', compact('drivers'));
    }

    public function create()
    {
        $data = (object) [
            'action' => 'driver/create',
        ];

        return view('pages.driver.form', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|digits_between:10,14',
        ]);

        Driver::create($request->only('name', 'phone', 'status'));

        Helper::addLog('added a driver');

        return redirect()->route('driver');
    }

    public function edit(Driver $driver)
    {
        $data = (object) [
            'action' => 'driver/edit/'. $driver->id,
            'driver' => $driver,
        ];

        return view('pages.driver.form', compact('data'));
    }

    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|digits_between:10,14',
        ]);

        $driver->update($request->only('name', 'phone', 'status'));

        Helper::addLog('updated a driver');

        return redirect()->route('driver');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();

        Helper::addLog('deleted a driver');

        return redirect()->route('driver');
    }
}
