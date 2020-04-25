<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug'];

    public function subcategories(){
        return $this->hasMany(SubCategory::class);
    }

    public function domains(){
        return $this->hasMany(Domain::class);
    }
}
