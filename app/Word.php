<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{   
    protected $fillable = ["word", "category_id"];
    //one to many relationship for category to words
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
