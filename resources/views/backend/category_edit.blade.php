@extends('backend.master')

@section('title')
<title>Trang quản trị</title>
@endsection

@section('wrapper-header')
<section class="content-header">
  <h1>
    Loại Sản Phẩm
    <small style="color: red;">Cập nhập</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Loại sản phẩm</li>
    <li class="active">Cập nhập</li>
  </ol>
</section>
@endsection 

<!-- content  -->
@section('wrapper-content')
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form action="{{ route('category.update',$data->id) }}" method="post" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="form-group">
           <label for=inputCategory>Tên Category</label>
           <input type="text" class="form-control" id="inputCategory"  name="name" placeholder="Tên Category" value="{{ $data->categoryName }}">
           @if($errors->has('name'))
           <span class="text-danger">{{ $errors->first('name') }}</span>
           @endif 
         </div>

         <div class="form-group">
           <label for="inputStatus">Trạng Thái</label>
           <select id="inputStatus" class="form-control" name="status">
             @if($data->status == 1)
             <option value="1" selected="">Mở</option>
             <option value="0">Khóa</option>
             @elseif($data->status == 0)
             <option value="1">Mở</option>
             <option value="0" selected="">Khóa</option>
             @endif
           </select>
         </div>

         <div class="form-group">
          <label for="inputLogo">Logo</label>
          <div class="gallery">
            <img src="../storage/app/public/category/{{ $data->logo }}" class="previewImage" width="100px;" height="100px;" style="border: 1px solid #ccc;">
          </div>
          <input type="file" class="form-control" id="gallery-photo-add" name="logo">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success">Lưu Thông Tin</button>
        </div>

      </form>
    </div>
  </div>
</div>
<style type="text/css">
  .previewImage{
    width: 120px;
    height: 120px;
    margin: 10px;
    padding: 10px;
    border:1px solid #ccc;
  }
</style>
</section>
@endsection

@section('js')
<script type="text/javascript" src="backend/js/product.js"></script>
@endsection


