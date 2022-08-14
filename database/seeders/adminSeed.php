<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            DB::table('admins')->insert([
              'name' => "Halil İbrahim",
              'email' => "hello@gmail.com",
              'password' => bcrypt(123456)
            ]);
         
    }
}
