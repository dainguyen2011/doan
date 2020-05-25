<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table='products';
    protected $fillable = ['views', 'pay', 'quantity'];
    public function getDataFoodByKeyWord($keyword)
    {
        $data = DB::table('products')->where('product_name', '=', $keyword)->get();
        return $data;
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function gallery()
    {
        return $this->hasOne('App\galleries');
    }

    public function getSalePrice()
    {
        return $this->price * (100 - $this->sale) / 100;
    }

    public function getPrice()
{
    return $this->sale ? $this->getSalePrice() : $this->price;
}
    public function order()
    {
        return $this->hasMany('App\Orders');
    }
    public function order_product(){
        return $this->hasMany(OrderProduct::class,'product_id');
    }
    public function rating()
    {
        return $this->hasMany(Rating::class,'product_id','id');
    }
}
