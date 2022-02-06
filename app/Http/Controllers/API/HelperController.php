<?php

namespace App\Http\Controllers\API;

use App\Events\QRScan;
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

        try {
            event(new QRScan($scan->qr_codes_id));
        } catch (\Exception $error) {

        }

        return response()->json([
            'success' => true,
            'message' => $scan,
        ], 200);
    }
}
