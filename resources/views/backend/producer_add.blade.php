@extends('backend.master')

@section('wrapper-header')
<section class="content-header">
  <h1>
    Nhà Cung Cấp
    <small style="color: red;">Thêm mới</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Nhà cung cấp</li>
    <li class="active">Thêm Mới</li>
  </ol>
</section>
@endsection 

<!-- content  -->
@section('wrapper-content')
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form action="{{ route('producer.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
           <label for=inputCategory>Tên Nhà Cung Cấp</label>
           <input type="text" class="form-control" id="inputCategory"  name="name" placeholder="Tên Thương Hiệu" value="{{ old('name') }}">
           @if($errors->has('name'))
           <span class="text-danger">{{ $errors->first('name') }}</span>
           @endif 
         </div>
         <div class="form-group">    
           <label for="inputStatus">Trạng Thái</label>
           <select id="inputStatus" class="form-control" name="status">
             <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Mở</option>
             <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Khóa</option>
           </select>
           @if($errors->has('status'))
           <span class="text-danger">{{ $errors->first('status') }}</span>
           @endif 
         </div>
         <div class="form-group">
          <label for="inputLogo">Logo</label>
          <div class="gallery"></div>
          <input type="file" class="form-control" id="gallery-photo-add" name="logo">
          @if($errors->has('logo'))
          <span class="text-danger">{{ $errors->first('logo') }}</span>
          @endif 
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Lưu Thông Tin</button>
        </div>
      </form>

    </div>
  </div>
</div>
<style type="text/css">
  .previewImage{
    width: 120px;
    height:35px;
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




