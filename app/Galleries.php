<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    protected  $table='galleries';
    protected $fillable=['product_id','image','image1'];
    public function product(){
        return $this->hasOne('products');
    }
}
