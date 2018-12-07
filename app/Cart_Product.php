<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_Product extends Model
{
    protected $table = 'carts_products';

    protected $fillable = [
        'id','cart_id','product_id'
     ];


     public function cart() {
        return $this->belongsTo('App\Cart');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }

}
