<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BillDetail;
use App\Bill;
use App\Product;
use App\Image;

class BillController extends Controller
{
	public function getBill($id){

		if(Auth::check()){

			$bill = Bill::where('id',$id)->firstOrFail();
			$data = BillDetail::where('id_bill',$id)->get();

			foreach ($data as $key => $value) {
				$value->name = Product::where('id',$value->id_product)->value('name');
				$value->image = Image::where('id_product',$value->id_product)->value('image');
			}

			return view('frontend.bill_detail',compact('data','bill')); 
		}else
		{
			return redirect()->route('frontend.login');    		
		}
	}
}
