<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = 'image_products';

    protected $fillable = ['product_id', 'image'];
}
