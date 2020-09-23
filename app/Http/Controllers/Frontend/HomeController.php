<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\Category;

class HomeController extends Controller
{
	public function index(){
		// sản phẩm có % khuyến mãi lớn nhất
		$sale = Product::join('category','product.id_category','=','category.id')
    					->join('producer','product.id_producer','=','producer.id')
						->where('category.status',1)
						->where('producer.status',1)
						->where('product.status',1)
						->orderBy('product.promotion','DESC')
						->limit(8)->select('product.*')->get();

		foreach ($sale as $key => $value) {               
			$value->image = Image::where('id_product',$value->id)->value('image');
			$value->slugCategory = Category::where('id',$value->id_category)->value('slug');
		}

		// sản phẩm hot mói nhất
		$hot = Product::join('category','product.id_category','=','category.id')
						->join('producer','product.id_producer','=','producer.id')
						->where('category.status',1)
						->where('producer.status',1)
						->where('product.status',1)
						->where('product.hot',1)
						->orderBy('product.created_at','DESC')
						->limit(8)->select('product.*')->get();

		foreach ($hot as $key => $value) {
			$value->image = Image::where('id_product',$value->id)->value('image');
			$value->slugCategory = Category::where('id',$value->id_category)->value('slug');
		}

	   return view('frontend.home',compact('sale','hot'));
	}

	public function notification(){
		return view("frontend.notification");
	}


}
