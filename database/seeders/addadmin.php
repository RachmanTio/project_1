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
        \DB::table('tb_user')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '2y$10$b5LYHcTxgETTtZ1SHlqfUewgDk4nT5B4f82ak1Ld/LsOoIhMyevPu',
                'is_admin' => '1',
            ],
        ]);
    }
}
