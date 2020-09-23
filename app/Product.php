<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Product extends Model{

    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = "product";
    protected $fillable = [
        'id',
        'name',
        'id_category',
        'slug',
        'new',
        'hot',
        'created_at',
        'updated_at',
    ];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function scopeFilter($query, QueryFilter $filters){
    	return $filters->apply($query);
    }
}
