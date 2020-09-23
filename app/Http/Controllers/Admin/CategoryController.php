<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\EditCategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::paginate(10); 
        return view('backend.category',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->categoryName = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->status = $request->status;

        // lưu ảnh
        if($request->hasFile('logo')) {
           $image = $request->logo;      
           $filenameWithExt = $image->getClientOriginalName();          
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);               
           $extension = $image->getClientOriginalExtension();    
           $fileNameToStore = $filename.'_'.time().'.'.$extension;
           $path = $image->storeAs('public/category', $fileNameToStore);
           $category->logo = $fileNameToStore;    
       }

       $category->save();

       return redirect()->route('category.index')->with('success','Thêm mới loại sản phẩm thành công!');       
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view('backend.category_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->categoryName = $request->name;
        $category->status = $request->status;
        if($request->has('logo'))
        {
         $file_path = '../storage/app/public/category/'.$category->image;             
         if(File::exists($file_path)){   
           File::delete($file_path);
        }
        $image = $request->logo;      
        $filenameWithExt = $image->getClientOriginalName();          
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);               
        $extension = $image->getClientOriginalExtension();    
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $image->storeAs('public/category', $fileNameToStore);
        $category->logo = $fileNameToStore;   
        }
        $category->save();
        
        return redirect()->route('category.index')->with('success','Chỉnh sửa loại sản phẩm thành công!');   
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $file_path = '../storage/app/public/category/'.$category->logo;             
        if(File::exists($file_path)){   
           File::delete($file_path);
        }
        $category->delete();
        return redirect()->back()->with('success','Xóa danh mục thành công!');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $category = Category::findOrFail($id);
        $category->status = ! $category->status;
        $category->save();

        return redirect()->back();
    }
}
