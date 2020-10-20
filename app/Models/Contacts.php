<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    public $fillable =["contact_type_id" , "contact" ,"account_id" ,"account_type"];

  
    function contact_type(){
        return $this->belongsTo("App\Models\ContactType");
    }

    public function account()
    {
        return $this->morphTo();
    }
}
