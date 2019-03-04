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
    public function address() {
        return $this->hasMany('App\Address');
    }
    public function user() {
        return $this->hasOne('App\User');
    }
    public function getTotal() {
        $total = 0;
        foreach($this->cart_product as $cart_product) {
            $total += $cart_product->amount * $cart_product->product->price;
        }
        return $total;
    }
    public function deleteAllItems() {
        foreach($this->cart_product as $cart_product) {
            $cart_product->delete();
        }
    }
}
