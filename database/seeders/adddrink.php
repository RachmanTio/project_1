<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adddrink extends Seeder
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
                'nama_product' => 'Iced Coffee Jelly Float ',
                'deskripsi' => 'Es kopi 100% Arabika dengan susu yang segar dan tambahan jelly serta es krim yang yummy.',
                'gambar' => 'gambar/Iced Coffee Jelly Float.png',
                'harga' => '20000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Coca-Cola McFloat',
                'deskripsi' => 'Minuman berkarbonasi dengan rasa cola dengan tambahan es krim vanilla McDonald s',
                'gambar' => 'gambar/Coca-Cola McFloat.png',
                'harga' => '25000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Fruit Tea Lemon',
                'deskripsi' => 'Teh rasa buah lemon yang segar',
                'gambar' => 'gambar/Fruit Tea Lemon.png',
                'harga' => '15000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Coca Cola',
                'deskripsi' => 'Minuman berkarbonasi dengan rasa cola.',
                'gambar' => 'gambar/Coca Cola.png',
                'harga' => '23000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Sprite',
                'deskripsi' => 'Minuman berkarbonasi dengan rasa perpaduan lemon lime dan soda .',
                'gambar' => 'gambar/Sprite.png',
                'harga' => '23000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Fanta',
                'deskripsi' => 'Minuman berkarbonasi dengan rasa strawberry.',
                'gambar' => 'gambar/Fanta.png',
                'harga' => '25000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Tehbotol Sosro Tawar ',
                'deskripsi' => 'Perpaduan daun teh asli dan bunga jasmin alami yang khas, hadir dengan rasa Teh tawar khas Sosro dikemas dalam botol PET..',
                'gambar' => 'gambar/Tehbotol Sosro Tawar.png',
                'harga' => '24000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Iced Milo',
                'deskripsi' => 'Susu coklat Milo yang segar dan bernutrisi.',
                'gambar' => 'gambar/Iced Milo.png',
                'harga' => '45000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Iced Lychee Tea',
                'deskripsi' => 'Iced tea dengan rasa dan sensasi buah leci asli',
                'gambar' => 'gambar/Iced Lychee Tea.png',
                'harga' => '23000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Fanta McFloat',
                'deskripsi' => 'Minuman berkarbonasi dengan rasa strawberry dengan tambahan es krim vanilla McDonald s.',
                'gambar' => 'gambar/Fanta McFloat.png',
                'harga' => '21000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Iced Coffee Float',
                'deskripsi' => 'Es kopi 100% Arabika dengan susu yang segar dan tambahan es krim vanilla khas McDonald s.',
                'gambar' => 'gambar/Iced Coffee Float.png',
                'harga' => '30000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Iced Coffee Jelly',
                'deskripsi' => 'Es kopi 100% Arabika dengan susu yang segar dan tambahan jelly.',
                'gambar' => 'gambar/Iced Coffee Jelly.png',
                'harga' => '4000',
                'kategori' => '2',
            ],

            [
                'nama_product' => 'Iced Coffee ',
                'deskripsi' => 'Kesegaran es kopi dari 100% Arabica khas McCafe.',
                'gambar' => 'gambar/Iced Coffee.png',
                'harga' => '20000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Tehbotol Sosro',
                'deskripsi' => 'Perpaduan daun teh asli dan bunga jasmin alami yang khas',
                'gambar' => 'gambar/Tehbotol Sosro.png',
                'harga' => '25000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Tehbotol Sosro Kotak',
                'deskripsi' => 'Perpaduan daun teh asli dan bunga jasmin alami yang khas dikemas dalam bentuk Tetra pack yang praktis',
                'gambar' => 'gambar/Tehbotol Sosro Kotak.png',
                'harga' => '15000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Fruit Tea Blackcurrant',
                'deskripsi' => 'Teh rasa buah blackcurrant yang menyegarkan terkemas Tetra pack praktis.',
                'gambar' => 'gambar/Fruit Tea Blackcurrant.png',
                'harga' => '23000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Mineral Water Prim-a',
                'deskripsi' => 'Air Mineral kemasan Prim-A yang segar dan higienis',
                'gambar' => 'gambar/Mineral Water Prim-a.png',
                'harga' => '25000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Hot Coffee',
                'deskripsi' => 'Kopi 100% Arabica pilihan yang tersaji panas',
                'gambar' => 'gambar/Hot Coffee.png',
                'harga' => '15000',
                'kategori' => '2',
            ],
            [
                'nama_product' => 'Hot Tea',
                'deskripsi' => 'Teh melati yang tersaji panas dan dapat ditambahkan gula sesuai selera.',
                'gambar' => 'gambar/Hot Tea.png',
                'harga' => '23000',
                'kategori' => '2',
            ],
        ]);
    }
}
