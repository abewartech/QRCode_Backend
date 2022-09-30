<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Carbon\Carbon;

class HelperController extends Controller
{
    public function absen()
    {
        $absen = new Attendance();
        $absen->user_id = request('userId');
        $absen->latitude = request('lat');
        $absen->longitude = request('lng');
        $absen->save();

        return response()->json([
            'success' => true,
            'message' => $absen,
        ], 200);
    }

    public function checkabsen()
    {
        $fixpulang = null;
        $absen = Attendance::where('user_id', request('userId'))->whereDate('created_at', Carbon::now())->first();
        $pulang = Attendance::where('user_id', request('userId'))->whereDate('created_at', Carbon::now())->get();

        if (count($pulang) > 1) {
            $fixpulang = $pulang[count($pulang) - 1];
        }

        return response()->json([
            'success' => true,
            'message' => $absen,
            'isAbsen' => $absen ? true : false,
            'pulang' => $fixpulang,
        ], 200);
    }
}
