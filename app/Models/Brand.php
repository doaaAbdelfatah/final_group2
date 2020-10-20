<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $fillable =["name"];
    
    function products (){
        return $this->hasMany(Products::class);
    }

    function categories(){
        return $this->belongsToMany(Category::class ,"products");
    }
}
