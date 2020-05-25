<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table='rating';
    protected $fillable = ['product_id', 'user_id', 'rating','content'];
    //
    public function products()
    {

        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function users()
    {

        return $this->belongsTo(User::class,'user_id','id');
    }
}
