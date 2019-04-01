<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'title', 'author_id', 'isbn', 'published', 'edition', 'description', 'photo_id', 'aantal'
    ];

    public function author(){
        return $this->belongsTo('App\Author');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function rentals(){
        return $this->hasMany('App\Rental');
    }
}
