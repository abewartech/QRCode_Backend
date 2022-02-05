<?php

use App\Http\Controllers\API\HelperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('scanqrcode', [HelperController::class, 'scanqrcode']);
