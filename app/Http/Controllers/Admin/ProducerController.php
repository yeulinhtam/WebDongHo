<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\ProducerRequest;
use App\Http\Requests\Admin\EditProducerRequest;
use App\Producer;
use App\SupportFile;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Producer::paginate(10);
        return view('backend.producer_list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.producer_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProducerRequest $request)
    {
        $producer = new Producer();
        $producer->name = $request->name;
        $producer->slug = Str::slug($request->name, '-');
        $producer->status = $request->status;

        // lưu ảnh
        if($request->hasFile('logo')) {
           $image = $request->logo;      
           $file = new SupportFile();
           $producer->logo = $file->saveImage("producer",$image); 
       }       
       $producer->save();
       return redirect()->route('producer.index')->with('success','Thêm mới thương hiệu thành công'); 


   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Producer::findOrFail($id);
        return view('backend.producer_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProducerRequest $request, $id)
    {
        $producer = Producer::findOrFail($id);
        $producer->name = $request->name;
        $producer->status = $request->status;
        if($request->has('logo')){
            $file = new SupportFile();
            $file->deleteImage("producer",$producer->logo);
            $image = $request->logo;      
            $producer->logo = $file->saveImage("producer",$image); 
        }
        $producer->save();
        
        return redirect()->route('producer.index')->with('success','Chỉnh sửa thương hiệu thành công!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producer = Producer::findOrFail($id);
        $file_path = '../storage/app/public/producer/'.$producer->logo;             
        if(File::exists($file_path)){   
           File::delete($file_path);
        }
       $producer->delete();
       return redirect()->back()->with('success','Xóa thương hiệu thành công!');  
   }


   public function active($id){
    $producer = Producer::findOrFail($id);
    $producer->status = ! $producer->status;
    $producer->save();
    return redirect()->back();
   }
}
