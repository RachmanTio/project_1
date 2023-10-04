<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addadmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tb_pengguna')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin',
                'is_admin' => '1',
            ],
        ]);
    }
}
