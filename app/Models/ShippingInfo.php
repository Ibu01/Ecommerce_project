<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    use HasFactory;
    protected $fillable =[
        'phone',
        'email',
        'name',
        'cityname',
        'postalcode',
        'user_id',
    ];
}
