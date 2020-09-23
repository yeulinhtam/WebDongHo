@extends('backend.master')

@section('title')
<title>Trang quản trị</title>
@endsection

@section('wrapper-header')
<section class="content-header">
  <h1>
    Banner
    <small style="color: red;">Cập nhật</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Banner</li>
    <li class="active">Cập nhật</li>
  </ol>
</section>
@endsection 

<!-- content  -->
@section('wrapper-content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <form action="{{ route('banner.update',$data->id) }}" method="post" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="form-group">
           <label for=inputCategory>Banner</label>
           <input type="text" class="form-control" id="inputCategory"  name="name" placeholder="Tên Banner" value="{{ $data->name }}">
           @if($errors->has('name'))
           <span class="text-danger">{{ $errors->first('name') }}</span>
           @endif 
         </div>

         <div class="form-group">
           <label for="inputStatus">Trạng Thái</label>
           <select id="inputStatus" class="form-control" name="status">
             <option>Chọn trạng thái</option>
             <option value="1" @if($data->status == 1) {{ 'selected' }} @endif>Mở</option>
             <option value="0" @if($data->status == 0) {{ 'selected' }} @endif>Khóa</option>       
           </select>
            @if($errors->has('status'))
           <span class="text-danger">{{ $errors->first('status') }}</span>
           @endif 
         </div>

         <div class="form-group">
          <label for="inputLogo">Logo</label>
          <div class="gallery">
            <img src="../storage/app/public/banner/{{ $data->image }}" class="previewImage" width="100px;" height="100px;" style="border: 1px solid #ccc;">
          </div>
          <input type="file" class="form-control" id="gallery-photo-add" name="image">
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
    width: 520px;
    height:250px;
    margin-bottom: 10px;
    border:1px solid #ccc;
  }
</style>
</section>
@endsection

@section('js')
<script type="text/javascript" src="backend/js/product.js"></script>
@endsection


