<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_name',
        'user_id',
        'product_id',
        'product_quantity',
        'shipping_phone',
        'shipping_postalcode',
        'total_price',
        'status',
        'price',
    ];
}
