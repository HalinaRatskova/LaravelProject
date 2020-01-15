<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'name', 'address', 'cart',
        'total', 
    ];
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

   /* public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }*/
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }
    public function orderDetails(){
        return $this->hasMany('App\OrderProduct', 'order_id');
    }
}
