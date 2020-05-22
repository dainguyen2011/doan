<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DB;
use http\Env\Request;

class Orders extends Model
{

    protected $table = 'orders';
    protected $fillable = ['status', 'status_1','paid'];

    public static function getAllProductByOrderId($id)
    {
        $list_product = DB::table('order_product')->select("*")->where('order_id', '=', $id)->get();
        return $list_product;
    }

    public function customer()
    {

        return $this->belongsTo('App\Customers');
    }

    public function orderProducts()
    {

        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function product()
    {

        return $this->belongsTo(Product::class);
    }


    protected $changeStatus = [
        0 => [
            'name' => 'Đang chờ',
            'class' => 'label-primary'
        ],
        1 => [
            'name' => 'Đang xử lý',
            'class' => 'label-success',
        ],
        2 => [
            'name' => 'Đã xử lý',
            'class' => 'label-success',
        ],
        3 => [
            'name' => 'Hủy',
            'class' => 'label-danger',
        ]
    ];

    public function getStatus()
    {
        return array_get($this->changeStatus, $this->status_1, '[N\A]');
    }
}
