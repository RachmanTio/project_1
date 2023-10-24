<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    use HasFactory;

    protected $table = 'tb_orderdetail';
    protected $fillable = [
        'user_id',
        'product_id',
        'totalharga',
        'order_id',
        'statusproduct',
        'alamat',
        'qty',
    ];
}
