<?php

namespace App\Helpers;

use App\Models\Log;

class Helper
{
    public static function addLog($action)
    {
        $user = auth()->user();

        Log::create([
            'user_id' => $user->id,
            'action' => $action,
        ]);
    }
}