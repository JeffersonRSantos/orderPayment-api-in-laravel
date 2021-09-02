<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\Solicitation;

class Tools
{
    static function generateIdWepayout()
    {
        $count = DB::table('solicitation')->count() + 1;
        return "WPOID00". $count;
    }

    static function updateStatus($id_wepayout, $status)
    {
        try {
            Solicitation::where('id_wepayout', '=', $id_wepayout)->update(['status' => $status]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}