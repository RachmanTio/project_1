<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang_item';

    protected $primaryKey = 'id';
    protected $fillable = [
        'ID_PRODUCT',
        'qty',
        'nama',
        'gambar',
        'harga',
    ];

}
