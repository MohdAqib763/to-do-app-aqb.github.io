<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\AdminSeeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => "Jasmin Singh",
            'email' => 'jasmin@gmail.com',
            'password' => "jasmin12",
            'created_at'=>date("Y-m-d h:i:s")
        ]);
    }
}
