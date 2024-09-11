<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $data = (object) [
            'items' => Log::with('user')->orderByDesc('created_at')->get(),
        ];

        return view('pages.log.list', compact('data'));
    }
}
