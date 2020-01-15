<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";
    protected $fillable=['imagePath', 'title','description','price'];

    public function orders()
{
   return $this->belongsToMany('App\Order');
}

}
