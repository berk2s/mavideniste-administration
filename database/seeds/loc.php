<?php

use Illuminate\Database\Seeder;

class loc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = base_path('data.sql');

        //collect contents and pass to DB::unprepared
        DB::unprepared(file_get_contents($sql));
    }
}
