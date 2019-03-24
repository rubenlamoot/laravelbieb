<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'title', 'author_id', 'isbn', 'published', 'edition', 'description', 'aantal'
    ];

    public function author(){
        return $this->belongsTo('App\Author');
    }
}
