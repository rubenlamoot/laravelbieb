<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'street', 'house_nr', 'bus_nr', 'postal_code', 'city'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
