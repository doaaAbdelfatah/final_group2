<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['id', "name", "price", "qty", "brand_id", "category_id", "seller_id"];

    function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function seller()
    {
        return $this->belongsTo(User::class, "seller_id", "id");
    }


    function images(){
        return $this->hasMany(ProductImage::class ,"product_id" ,"id");
    }
}
