<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Backside\Pages\LoginController@get_view')
    ->name('login')
    ->middleware('guest');

Route::post('/', 'Backside\Pages\LoginController@login')
    ->middleware('guest');

Route::get('/anasayfa', 'Backside\Pages\DashboardController@get_view')
    ->middleware('auth');

Route::get('/profilim', 'Backside\Pages\Profile\ProfileController@get_view')
    ->middleware('auth');
Route::post('/profilim', 'Backside\Pages\Profile\ProfileController@handle_post')
    ->middleware('auth');

Route::get('/tercihlerim', 'Backside\Pages\Profile\PreferenceController@get_view')
    ->middleware('auth');
Route::post('/tercihlerim', 'Backside\Pages\Profile\PreferenceController@handle_post')
    ->middleware('auth');

Route::get('/sifre-degistir', 'Backside\Pages\Profile\ChangePasswordController@get_view')
    ->middleware('auth');
Route::post('/sifre-degistir', 'Backside\Pages\Profile\ChangePasswordController@handle_post')
    ->middleware('auth');
Route::get('/cikis', 'Backside\Partials\LogoutController@logout')
    ->middleware('auth');

Route::group(['prefix' => '/kategori', 'middleware' => ['auth']], function() {
    Route::get('/', 'Backside\Pages\Category\ListCategory@get_view');
});
