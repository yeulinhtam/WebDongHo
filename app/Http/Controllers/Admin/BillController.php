<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BillFilters;
use App\ProductFilters;
use App\Bill;
use App\BillDetail;
use App\Product;
use App\Image;
use Mail;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bill::paginate(10);
        return view('backend.bill_list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BillDetail::where('id_bill',$id)->paginate(10);
        $bill = Bill::where('id',$id)->firstOrFail();
        
        foreach ($data as $key => $value) {
            $value->name = Product::where('id',$value->id_product)->value('name');
            $value->image = Image::where('id_product',$value->id_product)->value('image');
        }

        return view('backend.bill_detail',compact('data','bill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status(Request $request,$id){
        $status = $request->status;
        $bill = Bill::findOrFail($id);

        if($status == 2){
            $messages = "đang được vận chuyển";
        }elseif($status == 3){
            $messages = "đã được giao hàng thành công";
        }elseif($status == 4){
            $messages = "đã bị hủy";
        }

        $product = BillDetail::where('id_bill',$id)->get();
        
        foreach ($product as $key => $value) {
            $value->name = Product::where('id',$value->id_product)->value('name');
            $value->image = Image::where('id_product',$value->id_product)->value('image');
        }


        if($bill->status < $status){
            if($bill->status == 3){
                return redirect()->back()->with("error","Đơn hàng đã giao thành công không thể hủy!");
            }

        $bill->status = $status;
        $bill->save();

        if($bill->status == 4){
            $this->destroyBill($product);
        }
        $this->sendMail($messages, $bill, $product);
        return redirect()->back();

        }elseif($bill->status > $status){
            return redirect()->back()->with('error','Đơn hàng không thể thay đổi!');
        }else{
            return redirect()->back();
        }
    }

    public function search(Request $request, BillFilters $filters){

        $key = $request->key;
        $select = $request->filter;
        
        if($key != null){
            switch ($select) {
                case 0:
                $data = Bill::filter($filters)->paginate(10);
                break;
                case 1:
                $data = Bill::filter($filters)->where('id','like',$key)->paginate(10);
                break;
                case 2:
                $data = Bill::filter($filters)->where('phone','like',$key)->paginate(10);
                break;
                case 3:
                $data = Bill::filter($filters)->where('email','like',$key)->paginate(10);
                break;
                default:
                break;
            }
        }else{
            $data = Bill::filter($filters)->paginate(10);
        }

        if(count($data) > 0){
            return view('backend.bill_list',compact('data'));
        }    
        return view('backend.bill_list',compact('data'))->withErrors(['Không tìm thấy hóa đơn!']);
    }


    public function sendMail($messages, $bill, $product){
        $data = array('messages' => $messages, 'bill' => $bill, 'product' => $product);
        Mail::send('bill',$data, function($m) use ($data){
            $m->to($data['bill']['email'], $data['bill']['name'])->subject('Thông báo đặt hàng thành công!');
            $m->from('yeulinhtam171@gmail.com','Vu Minh Watch');
        });
    }

    public function destroyBill($data){
        foreach ($data as $key => $value) {
            $product = Product::findOrFail($value->id_product);
            $product->quantity_out = $product->quantity_out - $value->quantity;
            $product->save();
        }
    }



}
