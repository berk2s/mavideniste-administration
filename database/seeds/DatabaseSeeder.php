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
            'user_name' => 'Berk Topcu',
            'user_phone' => '05396861440',
            'user_address' => '1625.ada d blok daire 5',
            'user_role' => 1,
            'user_branch' => 54,
            'is_theme_dark' => true,
            'email' => 'berk@mavideniste.com',
            'password' => \Illuminate\Support\Facades\Hash::make('1234')
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
