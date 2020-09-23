<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\ProductFilters;
use App\Category;
use App\Product;
use App\Producer;
use App\Image;

class CategoryController extends Controller{


	public function index($slugCategory, ProductFilters  $filters){
    	
    	$category = Category::findBySlugOrFail($slugCategory);

    	$title = $category->title; 
    	$id = $category->id;

    	$product = Product::filter($filters)
    					->join('category','product.id_category','=','category.id')
    					->join('producer','product.id_producer','=','producer.id')
    					->where('category.status','=',1)
    					->where('producer.status','=',1)
    					->where('product.id_category',$id)
    					->where('product.status',1)
    					->select('product.*')
    					->paginate(10);

    	// dd($product);

    	foreach ($product as $key => $value) {               
			$image = Image::where('id_product',$value->id)->first();
			$value->image = $image->image;
		}
		return view('frontend.list-product',compact('product','slugCategory'));
	}


	public function producer($slugCategory, $slugProducer, ProductFilters $filters){
		$category = Category::findBySlugOrFail($slugCategory);
		$idCategory = $category->id;

		$producer = Producer::findBySlugOrFail($slugProducer);
		$idProducer = $producer->id;

		$product = Product::filter($filters)
    					->where('id_category',$idCategory)
    					->where('id_producer',$idProducer)
    					->where('status',1)
    					->paginate(10);

    	foreach ($product as $key => $value) {               
			$image = Image::where('id_product',$value->id)->first();
			$value->image = $image->image;
		}

		return view('frontend.list-product',compact('product','slugCategory'));
	}
}
