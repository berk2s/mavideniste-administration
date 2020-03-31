<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_name' => 'Berk Topcu',
                'user_phone' => '05396861440',
                'user_address' => '1625.ada d blok daire 5',
                'user_role' => 1,
                'user_branch' => 54,
                'is_theme_dark' => true,
                'email' => 'berk@mavideniste.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'is_ghost' => true,
            ],
            [
                'user_name' => 'Berk Topcu2',
                'user_phone' => '05330773554',
                'user_address' => 'addresiizzzz',
                'user_role' => 1,
                'user_branch' => 2,
                'is_theme_dark' => true,
                'email' => 'berk2@mavideniste.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'is_ghost' => false,
            ],
        ]);

        DB::table('branch')->insert([
           [
               'branch_id' => 54,
               'branch_name' => 'Serdivan',
               'branch_committee' => 4,
               'branch_province' => 66,
               'branch_county' => 805,
               'status' => true
           ],
            [
                'branch_id' => 2,
                'branch_name' => 'Adapazari',
                'branch_committee' => 4,
                'branch_province' => 66,
                'branch_county' => 806,
                'status' => true
            ],
        ]);

        DB::table('appsettings')->insert([
            [
                'has_update' => false,
                'is_update_required' => false,
                'version' => 1.0,
                'playstore_link' => 'http://www.playstore.com',
                'appstore_link' => 'http://www.appstore.com'
            ]
        ]);

        DB::table('delivered_notification_settings')->insert([
            [
                'title' => 'Teslim edildi',
                'text' => 'Siparis teslim edildi'
            ]
        ]);

        DB::table('enroute_notification_settings')->insert([
            [
                'title' => 'Yolda',
                'text' => 'Siarpisin yolda'
            ]
        ]);

        DB::table('preparing_notification_settings')->insert([
            [
                'title' => 'Hazirlaniyor',
                'text' => 'Siparis hazirlaniyor'
            ]
        ]);

        DB::table('user_authority')->insert([
           ['user_id' => 1, 'page_id' => 1],
           ['user_id' => 1, 'page_id' => 2],
           ['user_id' => 1, 'page_id' => 3],
           ['user_id' => 1, 'page_id' => 4],
           ['user_id' => 1, 'page_id' => 5],
           ['user_id' => 1, 'page_id' => 6],
           ['user_id' => 1, 'page_id' => 7],
           ['user_id' => 1, 'page_id' => 8],
           ['user_id' => 1, 'page_id' => 9],
           ['user_id' => 1, 'page_id' => 10],
           ['user_id' => 1, 'page_id' => 11],
           ['user_id' => 1, 'page_id' => 12],
           ['user_id' => 1, 'page_id' => 13],
           ['user_id' => 1, 'page_id' => 14],
           ['user_id' => 1, 'page_id' => 15],
           ['user_id' => 1, 'page_id' => 16],
           ['user_id' => 1, 'page_id' => 17],
           ['user_id' => 1, 'page_id' => 18],
           ['user_id' => 1, 'page_id' => 19],
           ['user_id' => 1, 'page_id' => 20],
           ['user_id' => 1, 'page_id' => 21],
           ['user_id' => 1, 'page_id' => 22],
           ['user_id' => 1, 'page_id' => 23],
           ['user_id' => 1, 'page_id' => 24],
           ['user_id' => 1, 'page_id' => 25],
           ['user_id' => 1, 'page_id' => 26],
           ['user_id' => 1, 'page_id' => 27],
           ['user_id' => 1, 'page_id' => 28],
           ['user_id' => 1, 'page_id' => 29],
           ['user_id' => 1, 'page_id' => 30],
           ['user_id' => 1, 'page_id' => 31],
           ['user_id' => 1, 'page_id' => 32],
           ['user_id' => 1, 'page_id' => 33],
           ['user_id' => 1, 'page_id' => 34],
           ['user_id' => 1, 'page_id' => 35],
           ['user_id' => 1, 'page_id' => 36],
           ['user_id' => 1, 'page_id' => 37],
           ['user_id' => 1, 'page_id' => 38],
           ['user_id' => 1, 'page_id' => 39],
           ['user_id' => 1, 'page_id' => 40],
           ['user_id' => 1, 'page_id' => 41],
           ['user_id' => 1, 'page_id' => 42],
           ['user_id' => 1, 'page_id' => 43],
           ['user_id' => 1, 'page_id' => 44],
           ['user_id' => 1, 'page_id' => 45],
           ['user_id' => 1, 'page_id' => 46],
           ['user_id' => 1, 'page_id' => 47],
           ['user_id' => 1, 'page_id' => 48],
           ['user_id' => 1, 'page_id' => 49],
           ['user_id' => 1, 'page_id' => 50],
           ['user_id' => 1, 'page_id' => 51],
        ]);

        DB::table('pages')->insert([

            ['page_url' => 'anasayfa', 'desc' => 'Anasayfa', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 1],

            ['page_url' => 'kategori', 'desc' => 'Kategori listesi ve düzenlenmesi', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 2],
            ['page_url' => 'kategori/ekle', 'desc' => 'Kategori ekleme', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 2],
            ['page_url' => 'kategori/tag/ekle', 'desc' => 'Alt kategori ekleme', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 2],
            ['page_url' => 'kategori/analiz', 'desc' => 'Kategoriler ve kategori analizi', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 2],

            ['page_url' => 'marka', 'desc' => 'Marka listesi ve düzenlenmesi', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 3],
            ['page_url' => 'marka/ekle', 'desc' => 'Marka ekleme', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 3],

            ['page_url' => 'urun', 'desc' => 'Ürün listesi ve düzenlenmesi', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 4],
            ['page_url' => 'urun/ekle', 'desc' => 'Ürün ekleme', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 4],
            ['page_url' => 'urun/analiz', 'desc' => 'Ürün analizleri', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 4],

            ['page_url' => 'siparisler', 'desc' => 'Canlı siparişler ve aksiyonlar', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 5],
            ['page_url' => 'siparisler/gecmis', 'desc' => 'Geçmiş siparişler ve aksiyonlar', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 5],
            ['page_url' => 'siparisler/gecmis/uye', 'desc' => 'Üyenin geçmiş siparişleri ve aksiyonları', 'is_sub' => true, 'is_owner_page' => false, 'tab'=> 5],

            ['page_url' => 'kampanya', 'desc' => 'Kampanyalar', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 6],
            ['page_url' => 'kampanya/olustur', 'desc' => 'Kampanya oluşturma', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 6],

            ['page_url' => 'kupon', 'desc' => 'Kuponlar', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 7],
            ['page_url' => 'kupon/olustur', 'desc' => 'Kupon oluşturma', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 7],

            ['page_url' => 'etkilesim/sms-gonder', 'desc' => 'SMS gönderme', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 8],
            ['page_url' => 'etkilesim/bildirim-gonder', 'desc' => 'Bildirim gönderme', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 8],

            ['page_url' => 'haberler', 'desc' => 'Haberler', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 9],
            ['page_url' => 'haberler/olustur', 'desc' => 'Haber oluştur', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 9],

            ['page_url' => 'kullanicilar', 'desc' => 'Kullanıcı listesi ve düzenlenmesi', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 10],

            ['page_url' => 'bayim', 'desc' => 'Bayim', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 11],
            ['page_url' => 'bayim/ayarlar', 'desc' => 'Bayim ayarlar', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 11],
            ['page_url' => 'bayim/operatorler', 'desc' => 'Bayim operatör listesi', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 11],
            ['page_url' => 'bayim/operatorler/duzenle', 'desc' => 'Bayi operatör düzenleme', 'is_sub' => true, 'is_owner_page' => false, 'tab'=> 11],
            ['page_url' => 'bayim/operatorler/sil', 'desc' => 'Bayi operatör silme', 'is_sub' => true, 'is_owner_page' => false, 'tab'=> 11],
            ['page_url' => 'bayim/operator/ekle', 'desc' => 'Bayim operatör ekle', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 11],
            ['page_url' => 'bayim/sikayetler', 'desc' => 'Bayim şikayetler', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 11],
            ['page_url' => 'bayim/log', 'desc' => 'Bayi log geçmişleri', 'is_sub' => true, 'is_owner_page' => true, 'tab'=> 12],


            ['page_url' => 'bayi', 'desc' => 'Bayi listesi', 'is_sub' => false, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/operatorler', 'desc' => 'Bayi operatör listesi', 'is_sub' => false, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/operatorler/duzenle', 'desc' => 'Bayi operatör düzenleme', 'is_sub' => true, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/operatorler/sil', 'desc' => 'Bayi operatör silme', 'is_sub' => true, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/operator/ekle', 'desc' => 'Bayi operatör ekle', 'is_sub' => false, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/ekle', 'desc' => 'Bayi ekleme', 'is_sub' => false, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/duzenle', 'desc' => 'Bayi düzenleme', 'is_sub' => true, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/duraklat', 'desc' => 'Bayiyi duraklat', 'is_sub' => true, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/yayin', 'desc' => 'Bayiyi yayına al', 'is_sub' => true, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/sil', 'desc' => 'Bayiyi sil', 'is_sub' => true, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/sikayetler', 'desc' => 'Bayi şikayetleri', 'is_sub' => false, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/sms', 'desc' => 'Herkese sms gönder', 'is_sub' => false, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/bildirim', 'desc' => 'Herkese bildirim gönder', 'is_sub' => false, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/kullanicilar', 'desc' => 'Tüm bayilere kayıtlı kullanıcılar', 'is_sub' => false, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/log', 'desc' => 'Bayi log geçmişleri', 'is_sub' => true, 'is_owner_page' => true, 'tab'=> 12],
            ['page_url' => 'bayi/istek', 'desc' => 'Bayilik istekleri', 'is_sub' => false, 'is_owner_page' => true, 'tab'=> 12],


            ['page_url' => 'ayarlar/profilim', 'desc' => 'Profil ayarları', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 13],
            ['page_url' => 'ayarlar/tercihlerim', 'desc' => 'Tercihlerim', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 13],
            ['page_url' => 'ayarlar/sifre-degistir', 'desc' => 'Şifre değişikliği', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 13],
            ['page_url' => 'ayarlar/log', 'desc' => 'Log geçmişi', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 13],
            ['page_url' => 'ayarlar/bildirim-ayarlari', 'desc' => 'Bildirim ayarları', 'is_sub' => false, 'is_owner_page' => false, 'tab'=> 13],

        ]);


        DB::table('user_roles')->insert([
            [
                'role_name' => 'A',
            ],
            [
                'role_name' => 'B',
            ],
            [
                'role_name' => 'C',
            ],
            [
                'role_name' => 'D'
            ]
        ]);


    }
}
