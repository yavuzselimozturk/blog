<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
        'name'=>'Yavuz Selim Öztürk',
        'email'=>'y.selimozturk0@gmail.com',
        'password'=>bcrypt(123123),

      ]);
    }
}
