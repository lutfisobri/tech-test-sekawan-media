<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Approval;
use App\Models\Booking;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $data = (object) [
                'items' => Booking::with(['user', 'driver', 'vehicle'])->get(),
            ];
        } else {
            $data = (object) [
                'items' => Approval::with(['user', 'booking.vehicle', 'booking.driver'])->where('user_id', auth()->user()->id)->get(),
            ];
        }

        return view('pages.task.list', compact('data'));
    }

    public function approve(Approval $approval)
    {
        $approval->update([
            'status' => 'approved',
            'approved_at' => now(),
        ]);


        if ($approval->level == 1) {
            Approval::create([
                'booking_id' => $approval->booking_id,
                'user_id' => $approval->booking->approver_id_2,
                'level' => 2,
                'status' => 'pending',
            ]);
            
            Helper::addLog('task approved');
        } else {
            $approval->booking->update([
                'status' => 'approved',
            ]);

            Helper::addLog('booking approved');
        }

        return redirect()->route('task');
    }

    public function reject(Approval $approval)
    {
        $approval->update([
            'status' => 'rejected',
        ]);

        $approval->booking->update([
            'status' => 'rejected',
        ]);

        $approval->booking->vehicle->update([
            'status' => 'available',
        ]);

        $approval->booking->driver->update([
            'status' => 'available',
        ]);

        Helper::addLog('task rejected');

        return redirect()->route('task');
    }
}
