<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\EditNewsRequest;
use App\SupportFile;
use App\News;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = News::paginate(10);
        return view('backend.news_list',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = new News();
        $news->name = $request->name;
        if($request->hasFile('image')) {    
           $file = new SupportFile();
           $news->image = $file->saveImage("news",$request->image); 
        }    
        $news->status = $request->status;
        $news->description = $request->description;
        $news->save();
        return redirect()->route('news.index')->with('success','Thêm mới tin tức thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = News::findOrFail($id);
        return view('backend.news_detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = News::findOrFail($id);
        return view('backend.news_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditNewsRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $news->name = $request->name;
        $news->status = $request->status;
        if($request->has('image')){
            $file = new SupportFile();
            $file->deleteImage("news",$news->image);
            $image = $request->image;      
            $news->image = $file->saveImage("news",$image); 
        }
        $news->description = $request->description;
        $news->save();
        
        return redirect()->route('news.index')->with('success','Chỉnh sửa tin tức thành công!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $file_path = '../storage/app/public/news/'.$news->image;             
        if(File::exists($file_path)){   
           File::delete($file_path);
        }
        $news->delete();
        return redirect()->back()->with('success','Xóa tin tức thành công!');  
    }

    public function active($id){
        $news = News::findOrFail($id);
        $news->status = ! $news->status;
        $news->save();

        return redirect()->back();
    }


    
}
