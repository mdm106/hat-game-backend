<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $fillable = ["category"];
    //one to many relationship for category to words
    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
