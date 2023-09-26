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
                'nama_product' => 'Burger Jumbo ',
                'deskripsi' => 'Makanan modern yang berbahan utama daging sayur tomat dan keju  , cocok dimakan disiang hari ketika kumpul denagn teman.',
                'gambar' => 'gambar/burger.kecil.jpg',
                'harga' => '20000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Burger Jumbo',
                'deskripsi' => 'Makanan modern yang berbahan utama daging sayur tomat dan keju  , cocok dimakan disiang hari ketika kumpul denagn teman',
                'gambar' => 'gambar/burger.jumbo.jpg',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Sate Kambing',
                'deskripsi' => 'Terbuat dari daging pilihan dan dibakar dengan cara terbaik, 1 porsi sate terdiri dari 10 tusuk sate',
                'gambar' => 'gambar/sate.kambing.jpg',
                'harga' => '15000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Boba Caramel',
                'deskripsi' => 'Minuman segar kekinian dengan boba yang kenyal dan perpaduan rasa caramel yang lezat, cocok diminum di siang yang terik.',
                'gambar' => 'gambar/boba.caramel.jpg',
                'harga' => '23000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Jus Jeruk',
                'deskripsi' => 'Minuman segar yang terbuat dari jeruk pilihan, rasa segarnya cocok diminum ketika siang hari .',
                'gambar' => 'gambar/juz.jeruk.jpg',
                'harga' => '12000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Es Campur',
                'deskripsi' => 'Ez yang terbuat dari pilihan pilihan terbaik segar nya dapat menghilangkan dahaga , cocok diminum di siang yang terik.',
                'gambar' => 'gambar/es.campur.jpg',
                'harga' => '15000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Kebab ',
                'deskripsi' => 'Makanan authentic asal timur tengah ini terbuat dari bahan bahan pilihan, cocok dimakan disiang hari ketika kumpul denagn teman',
                'gambar' => 'gambar/kebab.jpg',
                'harga' => '14000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Pizza',
                'deskripsi' => 'Makanan authentic khas negara ITALIA rasa antara keju dengan saus pilihan meembuat mood anda naik.',
                'gambar' => 'gambar/pizza.jpg',
                'harga' => '45000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Kentang Goreng',
                'deskripsi' => 'Terbuat dari kentang pilihan dan digoreng dengan pilihan, cocok dimakan ketika lagi berkumpul dengan teman teman ataupun keluarga',
                'gambar' => 'gambar/french.fries.jpg',
                'harga' => '13000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Soda Gembira',
                'deskripsi' => 'Minuman segar dengan perpaduan dari susu yang terbaik dan soda pilihan, cocok diminum di siang yang terik.',
                'gambar' => 'gambar/sodagembira.jpg',
                'harga' => '11000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Kopi',
                'deskripsi' => 'Pilihlah kopi terbaik di toko kami, cocok diminum ketika sarapan.',
                'gambar' => 'gambar/kopi.jpg',
                'harga' => '3000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Es Teh',
                'deskripsi' => 'Ez yang terbuat dari pilihan pilihan terbaik segar nya dapat menghilangkan deahaga , cocok diminum di siang yang terik.',
                'gambar' => 'gambar/icetea.jpg',
                'harga' => '4000',
                'kategori' => '2',
            ],

            
        ]);
    }
}
