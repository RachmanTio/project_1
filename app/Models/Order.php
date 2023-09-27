<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tb_order';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'ID_PRODUCT',
        'total',
    ];
}
