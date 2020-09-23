<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\ProductFilters;
use Mail;
use App\Product;
use App\Image;
use App\Cart;
use App\Bill;
use App\BillDetail;

class ProductController extends Controller
{
	public function index($slug){

		$product = Product::where('status', 1)->where('slug', $slug)->firstOrFail();

		$image = Image::where('id_product', $product->id)->get();

		$idCategory = $product->id_category;
		$sameProduct = Product::where('status', 1)->where('id_category', $idCategory)->where('id', '<>', $product->id)->paginate(4);
		foreach ($sameProduct as $key => $value) {
			$sameImage = Image::where('id_product', $value->id)->first();
			$value->image = $sameImage->image;
		}
		return view('frontend.product-detail', compact('sameProduct', 'product', 'image'));
	}

	public function addCart(Request $request, $id){
		
		$quantity = $request->qty;

		$product = Product::findOrFail($id);
		$inventory = $product->quantity - $product->quantity_out;

		// check inventory product
		if($inventory < $quantity ){
			return redirect()->back()->with("error","Sản phẩm " .$product->name. " chỉ còn lại " .$inventory . " sản phẩm!");
		}

		// update inventory product
		$product->quantity_out = $product->quantity_out + $quantity;
		$product->save();

		$image = Image::where('id_product', $id)->first();
		$product->image = $image;

		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);

		$cart->addProducts($product, $id, $request->qty);
		$request->session()->put('cart', $cart);
		return redirect()->route('frontend.cart');
	}

	public function getCart(){
		return view('frontend.cart');
	}


	public function deleteItemCart(Request $request,$id){
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		
		$qty = $cart->items[$id]['qty'];
		$product = Product::findOrFail($id);
		$product->quantity_out = $product->quantity_out - $qty;
		$product->save();

		$cart->removeItem($id);
		$request->session()->put('cart',$cart);
		return redirect()->back();
	}


	public function deleteCart(){
		Session::forget('cart');
		return redirect()->back();
	}


	public function updateCart(Request $request){

		$id = $request->id;
		$qty = $request->qty;

		$product = Product::findOrFail($id);

		$inventory = $product->quantity - $product->quantity_out;

		if($inventory < $qty){
			return response()->json([
			'status' => false,
			'messages' => 'Sản phẩm này đã hết!'
			]);
		}

		$product->quantity_out = $product->quantity_out + $qty;
		$product->save();

		$image = Image::where('id_product','=',$id)->first();

		$product->image = $image;

		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		
		$cart->updateCart($product,$id,$qty);

		$request->session()->put('cart',$cart);

		return response()->json([
			'status' => true,
			'messages' => 'Thêm sản phẩm thành công!'
		]);
	}

	public function deleteItemCartAjax(Request $request){
		$id = $request->id;
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		
		$qty = $cart->items[$id]['qty'];
		$product = Product::findOrFail($id);
		$product->quantity_out = $product->quantity_out - $qty;
		$product->save();

		$cart->removeItem($id);
		$request->session()->put('cart',$cart);

		return "ok";
	}

	public function getCheckOut(){
		return view('frontend.checkout');
	}


	public function postCheckOut(Request $request){

		$cart = Session::has('cart') ? Session::get('cart') : null;
		$data = $cart != null ? $cart->items : null;


		$bill = new Bill();
		$bill->id_customer = Auth::check() ? Auth::id() : 0;
		$bill->name = $request->name;
		$bill->total = $cart->totalPrice;
		$bill->email = $request->email;
		$bill->phone = $request->phone;
		$bill->address = $request->address;
		$bill->quantity = $cart->totalQty;
		$bill->note = $request->note;
		$bill->status = 1;
		$bill->save();

		foreach ($data as $key => $value) {
			$billDetail = new BillDetail();
			$billDetail->id_bill =$bill->id;
			$billDetail->id_product = $key;
			$billDetail->quantity = $value['qty'];
			$billDetail->price = $value['price'];

			$billDetail->save();
		}
		$request->session()->forget('cart');
		$this->sendMail($request->name, $bill->id, $request->email, $cart, $data);
		return redirect()->route('frontend.notification')->with("success","Xin chúc mừng bạn đã đặt hàng thành công. Kiểm tra email để cập nhập tình trạng đơn hàng!");
	}


	public function sendMail($name, $code, $email, $cart, $product){
		$data = array('name' => $name, 'code' => $code, 'email' => $email, 'cart' => $cart, 'product' => $product);
		Mail::send('mail',$data, function($m) use ($data){
			$m->to($data['email'],$data['name'])->subject('Thông báo đặt hàng thành công!');
			$m->from('yeulinhtam171@gmail.com','Vu Minh Watch');
		});
	}


	public function getSearch(Request $request,ProductFilters $filters){
		$key = $request->key;
		if(!$key){
			return redirect()->intended('trang-chu');
		}

		$product = Product::filter($filters)->where('status',1)->paginate(4);
    	foreach ($product as $key => $value) {               
			$image = Image::where('id_product',$value->id)->first();
			$value->image = $image->image;
		}
	
		return view('frontend.search',compact('product'));	
	}




	public function getSearchBrand(Request $request,$id){
		
		$p = $request->p;
		$min = 0;
		$max = 10000000000;
		switch ($p) {
			case 'duoi-1-trieu':
				$max = 1000000;
				break;
			case 'tu-1-3-trieu':
				$min = 1000001;
				$max = 3000000;
				break;
			case 'tu-3-7-trieu':
				$min = 3000001;
				$max = 7000000;
				break;
			case 'tren-7-trieu':
				$min = 7000001;
				break;
			default:
				break;
		}

		$sort = $request->sort;

		switch ($sort) {
			case 'san-pham-hot':
			$product = Product::where('status',1)->where('id_producer',$id)
								->where('price','>',$min)->where('price','<',$max)
								->where('hot',1)->orderBy('created_at','desc')
								->paginate(10);
				break;
			case 'cao-den-thap':
			$product = Product::where('status',1)->where('id_producer',$id)
								->where('price','>',$min)->where('price','<',$max)
								->orderBy('price','desc')->paginate(10);
				break;
			case 'thap-den-cao':
			$product = Product::where('status',1)->where('id_producer',$id)
								->where('price','>',$min)->where('price','<',$max)
								->orderBy('price','asc')->paginate(10);
				break;
			default:
			$product = Product::where('status',1)->where('id_producer',$id)
							->where('price','>',$min)->where('price','<',$max)
							->paginate(10);
				break;
		}

		foreach ($product as $key => $value) {               
			$image = Image::where('id_product',$value->id)->first();
			$value->image = $image->image;
		}

		return view('frontend.search',compact('product'));	
	}


	public function filter(ProductFilters  $filters){
    	$product = Product::filter($filters)->where('status',1)->paginate(4);
    	foreach ($product as $key => $value) {               
			$image = Image::where('id_product',$value->id)->first();
			$value->image = $image->image;
		}
		return view('frontend.list-product-brand',compact('product'));
	}

}
