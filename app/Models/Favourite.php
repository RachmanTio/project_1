<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table = 'tb_favourite';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_product',
        'qty',
        'nama_product',
        'gambar',
        'user_id',
        'harga',
    ];
    public function User()
    {
        return $this->belongsTo(User::tb_pengguna, 'id','id');
    }

}
