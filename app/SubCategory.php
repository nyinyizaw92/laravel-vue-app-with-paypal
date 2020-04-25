<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model

{

    protected $fillable = [
        'subcategoryname',
        'slug',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function domains(){
        return $this->hasMany(Domain::class);
    }
}
