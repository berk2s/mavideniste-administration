<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/category/upload', 'Backside\Api\CategoryImageUploadApi');
Route::resource('/product/upload', 'Backside\Api\ProductImageUploadApi');
Route::resource('/user/log', 'Backside\Api\Log\LogApi');

Route::resource('/location/province', 'Backside\Api\Location\ProvinceApi');
Route::resource('/location/county', 'Backside\Api\Location\CountyApi');
Route::resource('/location/district', 'Backside\Api\Location\DistrictApi');
Route::resource('/ghost', 'Backside\Api\Ghost\GhostApi');
Route::resource('/branch', 'Backside\Api\Branch\BranchApi');

Route::resource('/complaint', 'Backside\Api\Complaint\ComplaintApi');
Route::resource('/appsettings', 'Backside\Api\AppSettingsApi');
