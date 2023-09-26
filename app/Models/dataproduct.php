<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    protected $table = 'tb_product';
    protected $primaryKey = 'id';
    protected $fillable = array('nama_product','deskripsi','gambar','harga','kategori_id', );

}