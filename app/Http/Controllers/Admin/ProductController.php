<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\EditProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Image;
use App\Product;
use App\Category;
use App\Producer;
use App\SupportFile;

class ProductController extends Controller{

    public function __construct() {
        $this->middleware('auth:admin');
    }

/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $data = Product::join('category','product.id_category','=','category.id')
    ->select('product.*','category.categoryName')
    ->paginate(10);

    foreach ($data as $key => $value) {               
        $image = Image::where('id_product',$value->id)->first();
        $value->image = $image->image;
    }

    return view('backend.product_list',compact('data'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{  
    return view('backend.product_add');
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(ProductRequest $request)
{
    $product  = new Product();

    $product->name = $request->name;
    $product->id_producer = $request->producer;
    $product->id_category = $request->category;
  //  $product->slug = Str::slug($request->name, '-');
    $product->description = $request->description;
    $product->price = $request->price;
    $product->promotion = $request->promotion;
    $product->quantity = $request->quantity;
    $product->quantity_out = 0;
    $product->status = $request->status;
    $product->hot = $request->hot != null ? $request->hot : 0;
    $product->new = $request->new != null ? $request->new : 0;
    $product->save();
    if($request->hasFile('image')) {
        $file = new SupportFile();
        foreach($request->file('image') as $image) {
            $image = new Image([
                'id_product' => $product->id,
                'image' => $file->saveImage("product",$image),
            ]);               
            $image->save();
        }
    }

    return redirect()->route('product.index')->with('success','Thêm mới sản phẩm thành công'); 
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
    $data = Product::findBySlugOrFail($id);
    $image = Image::where('id_product',$data->id)->get();
    return view('backend.product_detail',compact('data','image'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $data = Product::findOrFail($id);
    $image = Image::where('id_product',$id)->get();
    return view('backend.product_edit',compact('data','image'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(EditProductRequest $request, $id)
{
    $product = Product::findOrFail($id);

    $product->name = $request->name;
    $product->id_producer = $request->producer;
    $product->id_category = $request->category;
    $product->slug = Str::slug($request->name, '-');
    $product->description = $request->description;
    $product->price = $request->price;
    $product->promotion = $request->promotion;
    $product->status = $request->status;
    $product->hot = $request->hot != null ? $request->hot : 0;
    $product->new = $request->new != null ? $request->new : 0;
    $product->save();

    if($request->hasFile('image')) {

        $file = new SupportFile();
// Xóa ảnh cũ
        $oldImage = Image::where('id_product',$product->id)->get();
        foreach ($oldImage as $key => $value) {
            $file->deleteImage("product",$value->image);
// xóa database ảnh cũ
            $value->delete();
        } 
        foreach($request->file('image') as $image) {
            $image = new Image([
                'id_product' => $product->id,
                'image' => $file->saveImage("product",$image),
            ]);               
            $image->save();
        }
    }


    return redirect()->route('product.index')->with('success','Chỉnh sửa sản phẩm thành công'); 

}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    $product = Product::findOrFail($id);
    $image = Image::where('id_product',$id)->get();
    $file = new SupportFile();
    foreach ($image as $key => $value) {
// xóa file ảnh cũ
        $file->deleteImage("product",$value->image);
// xóa database ảnh cũ  
        $value->delete();  
    }
    $product->delete();
    return redirect()->back()->with('success','Xóa sản phẩm thành công!');
}


public function active($id)
{
    $product = Product::findOrFail($id);
    $product->status = ! $product->status;
    $product->save();
    return redirect()->back();
}

public function hot($id)
{
    $product = Product::findOrFail($id);
    $product->hot = ! $product->hot;
    $product->save();
    return redirect()->back();
}

public function new($id)
{
    $product = Product::findOrFail($id);
    $product->new = ! $product->new;
    $product->save();
    return redirect()->back();
}

public function search(Request $request){

    $option = $request->option;
    $key = $request->key;

    if($option != 0){
        $data = Product::join('category','product.id_category','=','category.id')
        ->select('product.*','category.categoryName')
        ->where('id_category',$option)
        ->where('name','like', '%'. $key . '%')
        ->paginate(10);
    }else{
        $data = Product::join('category','product.id_category','=','category.id')
        ->select('product.*','category.categoryName')
        ->where('name','like', '%'. $key . '%')
        ->paginate(10);
    }

    if(count($data) > 0){
        foreach ($data as $key => $value) {               
            $image = Image::where('id_product',$value->id)->first();
            $value->image = $image->image;
        }
        return view('backend.product_list',compact('data'));
    }    
    return view('backend.product_list',compact('data'))->withErrors(['Không tìm thấy sản phẩm!']);
}




}


