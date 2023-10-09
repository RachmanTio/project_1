<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batal extends Model
{
    protected $table = 'tb_batal';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'ID_PRODUCT',
        'total',
        'gambar',
        'nama',
        'status',
        'alamat',
    ];
}
