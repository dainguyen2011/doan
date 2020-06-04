<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='categories';
    protected $fillable=['category_name','parent','description','ordering','image'];
    public function products()
    {

        return $this->belongsTo(Product::class,'product_id','id');
    }
}
