<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('q-r-code', 'QRCodeCrudController');
    Route::crud('scan-history', 'ScanHistoryCrudController');
    Route::get('q-r-code/{id}/print', 'QRCodeCrudController@print');
    Route::get('reset', 'ScanHistoryCrudController@reset');
    Route::crud('doktrin', 'DoktrinCrudController');
    Route::get('doktrin/{id}/download', 'DoktrinCrudController@download');
    Route::get('doktrin/{id}/preview', 'DoktrinCrudController@previewpdf');
    Route::crud('doktrin-fungsi-umum', 'DoktrinFungsiUmumCrudController');
    Route::crud('doktrin-fungsi-khusus', 'DoktrinFungsiKhususCrudController');
    Route::crud('jukgar', 'JukgarCrudController');
    Route::crud('juknis', 'JuknisCrudController');
    Route::crud('jukref', 'JukrefCrudController');
    Route::crud('protap', 'ProtapCrudController');
}); // this should be the absolute last line of this file