<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'address',
    ];

    public function orders()
    {
        return $this->hasMany('App\Orders');
    }
}
