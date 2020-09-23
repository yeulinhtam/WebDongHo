<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_detail";
    protected $fillable = [
        'id','id_bill','id_product','quantity','price','created_at','updated_at'
    ];
}
