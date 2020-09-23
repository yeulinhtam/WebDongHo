<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use Carbon\Carbon;

class NewsController extends Controller
{
	public function index(){
		Carbon::setLocale('vi');
		$data = News::where('status',1)->orderBy('created_at','desc')->paginate(10);
		foreach ($data as $key => $value) {
			$value->dft = Carbon::parse($value->created_at)->diffForHumans();
		}
		return view('frontend.news_list',compact('data'));
	}

	public function getNews($id){
		Carbon::setLocale('vi');
		$data = News::where('id',$id)->where('status',1)->firstOrFail();
		$data->dft = Carbon::parse($data->created_at)->diffForHumans();

		$readmore = News::where('id','<>',$id)
						->where('status',1)
						->orderBy('created_at','desc')
						->paginate(3);
						
		return view('frontend.news_detail',compact('data','readmore'));
	}
}
