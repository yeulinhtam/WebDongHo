<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     protected $table = "news";
     protected $fillable = [
        'id','name','image','status','description','created_at','updated_at',
    ];
}
