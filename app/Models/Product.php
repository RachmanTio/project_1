<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tb_product';

    protected $fillable = [
        'nama_product',
        'deskripsi',
        'gambar',
        'harga',
        'kategori_id', 
    ]; 
    public function keranjang()
    {
        return $this->belongsTo(Keranjang::keranjang_item, 'id', 'ID_PRODUCT');
    }
}
