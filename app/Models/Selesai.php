<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selesai extends Model
{
    protected $table = 'tb_selesai';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'id_product',
        'total',
        'gambar',
        'nama_product',
        'status',
        'alamat',
    ];
}
