<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_name',
        'product_short_des',
        'product_long_des',
        'price',
        'quantity',
        'product_category_name',
        'product_subcategory_name',
        'product_img',
        'product_category_id',
        'product_subcategory_id',
        'slug'
    ];
    
     public $timestamps = true;
}
