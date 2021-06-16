<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'date',
        'status',
        'details',
        'meta_keywords',
        'description',
        'image',
        'cat_id'
    ];


    public function Category()
    {
        return $this->belongsTo('App\NewsCategory', 'cat_id', 'id');
    }
}
