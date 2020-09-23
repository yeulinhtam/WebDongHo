<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bill";
    protected $fillable = [
        'id','id_customer','name','date_order','total','email','phone','address','note','status','created_at','updated_at'
    ];

     public function scopeFilter($query, QueryFilter $filters){
    	return $filters->apply($query);
    }
}
