<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'tb_orderdetail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'product_id',
        'totalharga',
        'qty',
        'order_id',
        'statusproduct',
    ];
}
