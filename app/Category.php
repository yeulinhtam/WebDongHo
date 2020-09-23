<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model{

	use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'category';
    
    protected $fillable = [
        'id','categoryName', 'slug', 'logo','created_at','updated_at',
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
