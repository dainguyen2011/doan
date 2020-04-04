<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable=[
        'first_name',
        'last_name',
        'email','phone','message',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
