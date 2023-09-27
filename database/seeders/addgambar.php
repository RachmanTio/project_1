<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addgambar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tb_product')->insert([
            [
                'nama_product' => 'Rica-rica Chicken Rice McD',
                'deskripsi' => 'Saus rica-rica pedas di atas nasi hangat dan daging ayam pilihan.',
                'gambar' => 'gambar/Rica-rica Chicken Rice McD.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Honey Garlic Chicken Rice McD',
                'deskripsi' => 'Nasi hangat dengan topping daging ayam disajikan dengan saus honey garlic',
                'gambar' => 'gambar/Honey Garlic Chicken Rice McD.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
        ]);
    }
}
