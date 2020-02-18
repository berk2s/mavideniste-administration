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
            'user_dealer' => 1,
            'is_theme_dark' => true,
            'email' => 'berk@mavideniste.com',
            'password' => \Illuminate\Support\Facades\Hash::make('14052000')
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
