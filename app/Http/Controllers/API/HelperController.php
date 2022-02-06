<?php

namespace App\Http\Controllers\API;

use App\Events\QRScan;
use App\Http\Controllers\Controller;
use App\Models\QRCode;
use App\Models\ScanHistory;
use Carbon\Carbon;

class HelperController extends Controller
{
    public function scanqrcode()
    {
        $qrcode = QRCode::where('name', request('qr'))->first();

        $scan = ScanHistory::updateOrCreate(
            ['name', request('name') . Carbon::now()->parse('Hi')],
            ['qr_codes_id' => $qrcode->id]
        );

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
