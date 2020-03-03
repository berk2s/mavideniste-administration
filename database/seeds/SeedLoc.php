<?php

use Illuminate\Database\Seeder;
class SeedLoc extends Seeder
{

    public function run()
    {
        $sql = base_path('data.sql');

        //collect contents and pass to DB::unprepared
        DB::unprepared(file_get_contents($sql));
    }

}
