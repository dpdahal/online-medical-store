<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'brand_name', 'price', 'mg', 'image', 'description', 'cat_id', 'man_date', 'exp_date',
    ];


    public function category()
    {

        return $this->belongsTo('App\Category', 'cat_id');
    }
}
