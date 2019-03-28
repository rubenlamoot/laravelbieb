<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    //
    protected $fillable = [
        'street', 'house_nr', 'bus_nr', 'postal_code', 'city'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function update_address_user($user_id, $address_id, $new_address){
       return DB::table('address_user')->where([['user_id', $user_id], ['address_id', $address_id]])->update(['address_id' => $new_address]);
    }
}
