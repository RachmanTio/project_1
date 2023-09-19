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
                'nama_product' => 'Es Campur',
                'deskripsi' => 'Es  Yang terbuat dari macam macam bahan terbaik , rasa segar nya mampu menghilangkan raga dahaga.',
                'gambar' => 'gambar/es.campur.jpg',
                'harga' => 'Rp.15.000',
                'kategori_id' => '2',
            ],
            
        ]);
    }
}
