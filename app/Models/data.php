<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id';
    protected $fillable = array('username','email','password','jeniskelamin','gambar', 'alamat','tanggallahir','created_at','updated_at');

}
