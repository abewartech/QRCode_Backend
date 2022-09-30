<?php

use App\Http\Controllers\API\HelperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('absen', [HelperController::class, 'absen']);
Route::post('checkabsen', [HelperController::class, 'checkabsen']);