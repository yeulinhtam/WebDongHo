<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
     protected $table = "banner";
     protected $fillable = [
        'id','name','image','status','created_at','updated_at',
    ];
}
