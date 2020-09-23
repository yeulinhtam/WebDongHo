<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "image";
    protected $fillable = [
        'id','id_product', 'image','created_at','updated_at',
    ];
}
