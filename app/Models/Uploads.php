<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Uploads extends Model
{
    
    protected $table ='tb_user';
    protected $primaryKey = 'id';
    protected $fillable = array('gambar','created_at','updated_at', 'alamat','tanggallahir');
}
