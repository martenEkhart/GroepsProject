<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','address_id','cart_id', 'total_cost','payment_status'
     ];
}
