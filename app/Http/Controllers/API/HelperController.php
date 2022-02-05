<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\QRCode;
use App\Models\ScanHistory;

class HelperController extends Controller
{
    public function scanqrcode()
    {
        $qrcode = QRCode::where('name', request('qr'))->first();

        $scan = new ScanHistory;
        $scan->name = request('name');
        $scan->qr_codes_id = $qrcode->id;
        $scan->save();

        return response()->json([
            'success' => true,
            'message' => $scan,
        ], 200);
    }
}
