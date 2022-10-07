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
    Route::get('doktrin-fungsi-umum/{id}/download', 'DoktrinFungsiUmumCrudController@download');
    Route::get('doktrin-fungsi-umum/{id}/preview', 'DoktrinFungsiUmumCrudController@previewpdf');
    Route::get('doktrin-fungsi-khusus/{id}/download', 'DoktrinFungsiKhususCrudController@download');
    Route::get('doktrin-fungsi-khusus/{id}/preview', 'DoktrinFungsiKhususCrudController@previewpdf');
    Route::get('jukgar/{id}/download', 'JukgarCrudController@download');
    Route::get('jukgar/{id}/preview', 'JukgarCrudController@previewpdf');
    Route::get('juknis/{id}/download', 'JuknisCrudController@download');
    Route::get('juknis/{id}/preview', 'JuknisCrudController@previewpdf');
    Route::get('jukref/{id}/download', 'JukrefCrudController@download');
    Route::get('jukref/{id}/preview', 'JukrefCrudController@previewpdf');
    Route::get('protap/{id}/download', 'ProtapCrudController@download');
    Route::get('protap/{id}/preview', 'ProtapCrudController@previewpdf');
    Route::crud('attendance', 'AttendanceCrudController');
    Route::get('attendance/export/{start}/{end}', 'AttendanceCrudController@historyexport');
    Route::get('statistics', 'AttendanceCrudController@statistics');
}); // this should be the absolute last line of this file