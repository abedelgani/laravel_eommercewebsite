<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert(
        [
            'name'=>'Admin',
            'email'=>'admin@fashionstore.com',
            'role'=>'admin',
            'password'=>Hash::make('admin123')
      ]
        );
    }
}
