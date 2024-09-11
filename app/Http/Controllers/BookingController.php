<?php

namespace App\Http\Controllers;

use App\Exports\ExportStatistic;
use App\Helpers\Helper;
use App\Models\Approval;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    public function index()
    {
        $data = (object) [
            'vehicles' => Vehicle::where('status', 'available')->get(),
            'drivers' => Driver::where('status', 'available')->get(),
            'users' => User::where('role', '!=', 'admin')->get(),
        ];

        return view('pages.booking.form', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        if ($request->approval_user_2 == $request->approval_user_1) {
            return redirect()->back()->withErrors(['approval_user_2' => ['Approval 2 must be different from Approval 1']])->withInput($request->all());
        }


        $vehicle = Vehicle::find($request->vehicle_id);
        $driver = Driver::find($request->driver_id);

        $vehicle->update(['status' => 'in_use']);
        $driver->update(['status' => 'unavailable']);

        $request->merge([
            'status' => 'pending',
            'user_id' => auth()->user()->id,
            'approver_id_1' => $request->approval_user_1,
            'approver_id_2' => $request->approval_user_2,
        ]);

        try {
            DB::beginTransaction();
    
            $booking = Booking::create($request->all());
            Approval::create([
                'booking_id' => $booking->id,
                'user_id' => $request->approval_user_1,
                'level' => 1,
                'status' => 'pending',
            ]);
    
            Helper::addLog('added a new booking request');
    
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            
            throw $th;
        }


        return redirect()->route('task');
    }

    public function export()
    {
        return Excel::download(new ExportStatistic, 'statistic.xlsx');
    }
}
