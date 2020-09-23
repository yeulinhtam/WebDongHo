<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BannerRequest;
use App\Http\Requests\Admin\EditBannerRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\SupportFile;
use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::paginate(10);
        return view('backend.banner',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        if($request->hasFile('image')) {    
           $file = new SupportFile();
           $banner->image = $file->saveImage("banner",$request->image); 
        }    
        $banner->status = $request->status;
        $banner->save();
        return redirect()->route('banner.index')->with('success','Thêm mới banner thành công!');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return redirect()->route('banner.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Banner::findOrFail($id);
        return view('backend.banner_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBannerRequest $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->name = $request->name;
        $banner->status = $request->status;
        if($request->has('image')){
            $file = new SupportFile();
            $file->deleteImage("banner",$banner->image);
            $image = $request->image;      
            $banner->image = $file->saveImage("banner",$image); 
        }
        $banner->save();
        
        return redirect()->route('banner.index')->with('success','Chỉnh sửa banner thành công!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $banner = Banner::findOrFail($id);
        $file_path = '../storage/app/public/banner/'.$banner->image;             
        if(File::exists($file_path)){   
           File::delete($file_path);
        }
        $banner->delete();
        return redirect()->back()->with('success','Xóa banner thành công!');  
    }

    public function active($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->status = !$banner->status;
        $banner->save();

        return redirect()->back();

    }
}
