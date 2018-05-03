<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        //delete
        Admin::truncate();

        //Insert
        Admin::insert([
            'name' => 'admin1',
            'email' => 'admin1@test.com',
            'password' => Hash::make('admin1')
        ]);
    }
}
