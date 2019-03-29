<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = '/images/';

    protected $fillable = [
        'filename'
    ];

    public function Book(){
        return $this->belongsTo('App\Book');
    }

}
