<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    protected $fillable = ['order_id', 'product_id', 'quantity'];

    public $primaryKey = 'id';


    //Timestamps

    public $timestamps =true;

public function order(){         
    return $this->belongsTo('App\Order');   

}
public function product(){
    return $this->hasMany('App\Product');   

}
}

