<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_name',
        'product_price',
        'product_image',
        'product_sub_image',
        'category_id',
        'product_bid_start',
        'product_bid_end',
    ];
}
