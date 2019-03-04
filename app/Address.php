<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // Dit doe je omdat hij anders gaat zoeken naar table address ipv addresses
    protected $table = 'addresses';
    
    public function address() {
        return $this->hasOne('App\user');
    }

}
