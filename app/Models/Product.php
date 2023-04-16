<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'supplier_id',
        'category_id',
        'product_code',
        'product_garage',
        'product_route',
        'photo',
        'description',
        'buy_date',
        'expire_date',
        'buying_price',
        'selling_price',

    ];

}
