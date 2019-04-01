<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    //
    protected $fillable = ['book_id', 'user_id', 'book_out', 'book_in'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function book(){
        return $this->belongsTo('App\Book');
    }
}
