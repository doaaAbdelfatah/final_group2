<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    function order(){
        return $this->belongsTo(Order::class ,"order_id" ,"id");
    }

    function prdouct(){
        return $this->belongsTo(Products::class ,"product_id" ,"id");

    }

}
