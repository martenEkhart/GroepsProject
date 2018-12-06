<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id','product_id'
     ];
     public function cart_product() {
        return $this->hasMany('App\Cart_Product');
    }
}
