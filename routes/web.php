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
    ->middleware(['auth', 'authority']);

Route::get('/cikis', 'Backside\Partials\LogoutController@logout')
    ->middleware('auth');

Route::group(['prefix' => '/ayarlar', 'middleware' => ['auth', 'authority']], function() {

    Route::get('/profilim', 'Backside\Pages\Profile\ProfileController@get_view');
    Route::post('/profilim', 'Backside\Pages\Profile\ProfileController@handle_post');

    Route::get('/tercihlerim', 'Backside\Pages\Profile\PreferenceController@get_view');
    Route::post('/tercihlerim', 'Backside\Pages\Profile\PreferenceController@handle_post');

    Route::get('/sifre-degistir', 'Backside\Pages\Profile\ChangePasswordController@get_view');
    Route::post('/sifre-degistir', 'Backside\Pages\Profile\ChangePasswordController@handle_post');

    Route::get('/bildirim-ayarlari', 'Backside\Pages\Profile\NotificationSettings@get_view');
    Route::post('/bildirim-ayarlari/degistir/hazirlaniyor', 'Backside\Pages\Profile\NotificationSettings@handle_prepare')
        ->name('handle_change_prepare_notification_settings');
    Route::post('/bildirim-ayarlari/degistir/yolda', 'Backside\Pages\Profile\NotificationSettings@handle_enroute')
        ->name('handle_change_enroute_notification_settings');
    Route::post('/bildirim-ayarlari/degistir/basarili', 'Backside\Pages\Profile\NotificationSettings@handle_delivered')
        ->name('handle_change_delivered_notification_settings');

    Route::get('/log', 'Backside\Pages\Profile\LogController@get_view');

});

Route::group(['prefix' => '/kategori', 'middleware' => ['auth', 'authority']], function() {
    Route::get('/', 'Backside\Pages\Category\ListCategory@get_view');
    Route::get('/analiz', 'Backside\Pages\Category\Analytics@get_view');

    Route::get('/ekle', 'Backside\Pages\Category\NewCategory@get_view');
    Route::get('/tag/ekle', 'Backside\Pages\Category\NewSubCategory@get_view');

    Route::post('/ekle', 'Backside\Pages\Category\NewCategory@handle_post');
});

Route::group(['prefix' => '/marka', 'middleware' => ['auth', 'authority']], function() {
    Route::get('/', 'Backside\Pages\Brand\ListBrandController@get_view');
    Route::get('/ekle', 'Backside\Pages\Brand\NewBrandController@get_view');

});

Route::group(['prefix' => '/urun', 'middleware' => ['auth', 'authority']], function() {
    Route::get('/', 'Backside\Pages\Product\ListProductController@get_view');
    Route::get('/ekle', 'Backside\Pages\Product\NewProductController@get_view');
    Route::get('/analiz', 'Backside\Pages\Product\Analytic@get_view');

});

Route::group(['prefix' => '/etkilesim', 'middleware' => ['auth', 'authority']], function() {

    Route::get('/bildirim-gonder', 'Backside\Pages\Interactions\SendNotification@get_view');
    Route::get('/sms-gonder', 'Backside\Pages\Interactions\SendSMS@get_view');

});

Route::group(['prefix' => '/kullanicilar', 'middleware' => ['auth', 'authority']], function() {

    Route::get('/', 'Backside\Pages\Users\UserList@get_view');

});

Route::group(['prefix' => '/siparisler', 'middleware' => ['auth', 'authority']], function() {

    Route::get('/', 'Backside\Pages\Orders\Live@get_view');
    Route::get('/gecmis', 'Backside\Pages\Orders\History@get_view');
    Route::get('/gecmis/uye/{user_id}', 'Backside\Pages\Orders\UserHistory@get_view');

});

Route::group(['prefix' => '/kupon', 'middleware' => ['auth', 'authority']], function() {

    Route::get('/', 'Backside\Pages\Coupon\ListCoupon@get_view');
    Route::get('/olustur', 'Backside\Pages\Coupon\NewCoupon@get_view');

});

Route::group(['prefix' => '/bayi', 'middleware' => ['auth', 'authority']], function() {

    Route::get('/', 'Backside\Pages\Branch\ListBranch@get_view');
    Route::get('/duzenle/{id}', 'Backside\Pages\Branch\EditBranch@get_view');
    Route::post('/duzenle/{id}', 'Backside\Pages\Branch\EditBranch@handle_post');
    Route::get('/duraklat/{id}', 'Backside\Pages\Branch\ListBranch@pause_branch');
    Route::get('/yayin/{id}', 'Backside\Pages\Branch\ListBranch@play_branch');
    Route::get('/sil/{id}', 'Backside\Pages\Branch\ListBranch@delete_branch');

    Route::get('/operatorler', 'Backside\Pages\Branch\OperatorList@get_view');
    Route::get('/operatorler/duzenle/{id}', 'Backside\Pages\Branch\EditBranchOperator@get_view');
    Route::post('/operatorler/duzenle/{id}', 'Backside\Pages\Branch\EditBranchOperator@handle_post');
    Route::get('/operatorler/sil/{id}', 'Backside\Pages\Branch\EditBranchOperator@handle_delete');


    Route::get('/ekle', 'Backside\Pages\Branch\NewBranch@get_view');
    Route::post('/ekle', 'Backside\Pages\Branch\NewBranch@handle_post');

    Route::get('/operator/ekle', 'Backside\Pages\Branch\NewBranchOperator@get_view');
    Route::post('/operator/ekle', 'Backside\Pages\Branch\NewBranchOperator@handle_post');

    Route::get('/sikayetler', 'Backside\Pages\Branch\Complaints@get_view');

    Route::get('/sms', 'Backside\Pages\Branch\SendSMS@get_view');
    Route::get('/bildirim', 'Backside\Pages\Branch\SendNotification@get_view');

    Route::get('/kullanicilar', 'Backside\Pages\Branch\UserList@get_view');
    Route::get('/log/{id}', 'Backside\Pages\Branch\Log@get_view');
    Route::get('/istek', 'Backside\Pages\Branch\RequestBranch@get_view');

   // Route::get('/hizmet-bedeli', '');

});

Route::group(['prefix' => '/bayim', 'middleware' => ['auth', 'authority']], function() {

    Route::get('/', 'Backside\Pages\MyBranch\MyBranch@get_view');

    Route::get('/ayarlar', 'Backside\Pages\MyBranch\BranchSettings@get_view');
    Route::post('/ayarlar', 'Backside\Pages\MyBranch\BranchSettings@handle_post');

    Route::get('/operatorler', 'Backside\Pages\MyBranch\BranchOperators@get_view');
    Route::get('/operatorler/duzenle/{id}', 'Backside\Pages\MyBranch\EditBranchOperator@get_view');
    Route::post('/operatorler/duzenle/{id}', 'Backside\Pages\MyBranch\EditBranchOperator@handle_post');
    Route::get('/operatorler/sil/{id}', 'Backside\Pages\MyBranch\EditBranchOperator@handle_delete');

    Route::get('/operator/ekle', 'Backside\Pages\MyBranch\NewBranchOperator@get_view');
    Route::post('/operator/ekle', 'Backside\Pages\MyBranch\NewBranchOperator@handle_post');

    Route::get('/sikayetler', 'Backside\Pages\MyBranch\Complaints@get_view');
    Route::get('/log/{id}', 'Backside\Pages\MyBranch\Log@get_view');

});

Route::group(['prefix' => '/kampanya', 'middleware' => ['auth', 'authority']], function() {

    Route::get('/', 'Backside\Pages\Campaign\ListCampaign@get_view');
    Route::get('/olustur', 'Backside\Pages\Campaign\NewCampaign@get_view');

});

Route::group(['prefix' => '/haberler', 'middleware' => ['auth', 'authority']], function() {

    Route::get('/', 'Backside\Pages\News\ListNews@get_view');
    Route::get('/olustur', 'Backside\Pages\News\NewNews@get_view');

});

