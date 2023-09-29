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
                'nama_product' => 'Egg and Cheese Muffin',
                'deskripsi' => 'Perpaduan scrambled egg dan keju gurih dalam setangkup English Muffin hangat. Tersedia dari jam 5-11 pagi.',
                'gambar' => 'gambar/eggandcheese.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Chicken Muffin',
                'deskripsi' => 'Setangkup English muffin hangat dilapis saus mayonais dengan daging ayam olahan yang digoreng dengan sempurna. Tersedia dari jam 5-11 pagi.',
                'gambar' => 'gambar/chickenmuffin.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Sausage McMuffin',
                'deskripsi' => 'English muffin disajikan dengan sosis ayam yang gurih dan selembar keju bernutrisi. Tersedia dari jam 5-11 pagi.',
                'gambar' => 'gambar/sausagemcmuffin.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Egg McMuffin',
                'deskripsi' => 'English muffin hangat yang disajikan dengan daging ayam asap, telur, dan keju bernutrisi. Tersedia dari jam 5-11 pagi.',
                'gambar' => 'gambar/Egg_McMuffin.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Double Big Mac',
                'deskripsi' => 'Burger Big Mac dengan tambahan daging lebih 2 patty (daging sapi)',
                'gambar' => 'gambar/doublebigmac.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Big Mac',
                'deskripsi' => 'Burger Ikonik McDonald s Dua lapis daging sapi gurih disajikan dengan saus spesial, selada segar, keju, acar timun, bawang, diapit roti bertabur wijen',
                'gambar' => 'gambar/bigmac.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Triple Cheeseburger',
                'deskripsi' => 'Perpaduan roti burger dengan 3 lapisan daging gurih berasal dari 100% daging sapi Australia dan 3 lapis keju, saus tomat, acar, potongan bawang dan mustard.',
                'gambar' => 'gambar/triplecheesburger.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Double Cheeseburger',
                'deskripsi' => 'Perpaduan roti burger dengan 2 Lapisan daging gurih dan 2 lapisan keju disajikan dengan saus tomat, acar, potongan bawang dan mustard.',
                'gambar' => 'gambar/doublebigmac.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'McNuggets® Shareable 20pcs',
                'deskripsi' => '',
                'gambar' => 'gambar/McNuggets® Shareable 20pcs.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Spicy Chicken McNuggets®',
                'deskripsi' => 'Spicy Chicken McNuggets® kini hadir kembali di McD. Nikmati potongan ayam asli dengan sensasi pedas yang renyah khas McDonalds, apalagi dengan sauce McNuggets® pilihanmu.',
                'gambar' => 'gambar/McNuggets® Shareable 20pcs.png',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Korean Soy Garlic Wings - A la Carte 6pcs',
                'deskripsi' => 'Nikmati menu A la Carte Korean Soy Garlic Wings. Dengan enam potongan sayap (Wingette & Drummette) dengan cita rasa Korean Soy Garlic yang renyah, gurih, dan lezat.',
                'gambar' => 'gambar/Korean Soy Garlic Wings - A la Carte 6pcs',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Korean Soy Garlic Wings - A la Carte 4pcs',
                'deskripsi' => 'Nikmati menu A la Carte Korean Soy Garlic Wings. Dengan empat potongan sayap (Wingette & Drummette) dengan cita rasa Korean Soy Garlic yang renyah, gurih, dan lezat.',
                'gambar' => 'gambar/Korean Soy Garlic Wings - A la Carte 4pcs',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Fish Snack Wrap',
                'deskripsi' => 'Daging ikan digoreng renyah dengan selada segar, keju istimewa dan saus spesial dalam balutan tortilla yang lembut',
                'gambar' => 'gambar/Fish Snack Wrap',
                'harga' => '25000',
                'kategori' => '1',
            ],
            [
                'nama_product' => 'Fish Fillet Burger',
                'deskripsi' => 'Daging ikan pilihan, dengan saus tartar dan keju istimewa dalam setangkup roti lembut kukus',
                'gambar' => 'gambar/Fish Fillet Burger',
                'harga' => '25000',
                'kategori' => '1',
            ],
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
