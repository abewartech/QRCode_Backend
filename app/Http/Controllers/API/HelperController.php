<?php

namespace App\Http\Controllers\API;

use App\Events\QRScan;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\QRCode;
use App\Models\ScanHistory;
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
}
