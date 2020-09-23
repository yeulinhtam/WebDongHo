<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Producer extends Model{
	
	use Sluggable;
    use SluggableScopeHelpers;

    protected $table = "producer";
    protected $fillable = [
        'id','name', 'slug', 'logo','created_at','updated_at',
    ];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
