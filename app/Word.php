<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{   
    //one to many relationship for category to words
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
