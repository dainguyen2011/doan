<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    protected $fillable=[
        'order_id',
        'product_id',
        'product_qty','product_name','product_price','product_size',
    ];
    public  function orders(){
        return $this->belongsTo(Orders::class,'order_id', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}

