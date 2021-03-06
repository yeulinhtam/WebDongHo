@extends('backend.master')
@section('wrapper-header')
<section class="content-header">
  <h1>
    Sản Phẩm
    <small style="color: red;">Thêm Mới</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Sản phẩm</li>
    <li class="active">Thêm mới</li>
  </ol>
</section>
@endsection
<!-- content  -->
@section('wrapper-content')
<section class="content">
<div class="container-fluid">
  <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
         <label for=inputName>Tên Sản Phẩm</label>
         <input class="form-control" id="inputName" name="name" placeholder="Tên sản phẩm">
         @if($errors->has('name'))
         <span class="text-danger">{{ $errors->first('name') }}</span>
         @endif 
       </div>
       <div class="form-group">
        <label>Hình ảnh</label>
        <div class="gallery"></div>
        <input type="file" name="image[]" class="form-control" multiple="" id="gallery-photo-add">
        @if($errors->has('image'))
         <span class="text-danger">{{ $errors->first('image') }}</span>
         @endif 
      </div>
      <div class="form-group">
       <label for="inputDescription">Mô Tả</label>
       <textarea name=description id="text" cols="3"></textarea>
       <script>
        CKEDITOR.replace( 'text', {
          filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        } );
      </script>
      @include('ckfinder::setup')  
      @if($errors->has('description'))
      <span class="text-danger">{{ $errors->first('description') }}</span>
      @endif                 
    </div>
    <div class="form-group">
      <label for="inputRadio">Trạng Thái</label><br>
      <input type="radio" name="status" value="0">
      <label for="block"> Khóa</label>
      <input type="radio" name="status" value="1" checked="">
      <label for="active"> Mở</label>
    </div>
  </div>
  <div class="col-md-4">
   <div class="form-group">
    <label for="inputCategory">Loại Sản Phẩm</label>
    <select class="form-control" name="category">
     @foreach($category as $key)
     <option value="{{ $key->id }}">{{ $key->categoryName }}</option> 
     @endforeach
   </select>
 </div>
 <div class="form-group">
   <label for="inputProducer">Nhà Cung Cấp</label>
   <select class="form-control" name="producer">
     @foreach($producer as $key)
     <option value="{{ $key->id }}">{{ $key->name }}</option> 
     @endforeach
   </select>
 </div>
 <div class="form-group">
  <label for="inputPrice">Giá Sản Phẩm</label>
  <input name="price" class="form-control" placeholder="Giá sản phẩm">
  @if($errors->has('price'))
         <span class="text-danger">{{ $errors->first('price') }}</span>
  @endif 
</div>
<div class="form-group">
  <label for="inputPromotion">% Khuyến Mãi</label>
  <input name="promotion" class="form-control" placeholder="% Khuyến mãi">
  @if($errors->has('promotion'))
         <span class="text-danger">{{ $errors->first('promotion') }}</span>
  @endif 
</div>
<div class="form-group">
  <label>Số lượng sản phẩm</label>
  <input name="quantity" class="form-control" placeholder="Số lượng sản phẩm">
  @if($errors->has('quantity'))
      <span class="text-danger">{{ $errors->first('quantity') }}</span>
  @endif 
</div>
<div class="form-group">
  <label class="radio-inline">
    <input type="checkbox" name="hot" value="1"> Sản phẩm nổi bật   
  </label>
  <label class="radio-inline">
    <input type="checkbox" name="new" value="1">  Sản phẩm mới
  </label>
</div>

</div>
</div>
<div class="row">
  <div class="col-md-12" style="padding-bottom: 50px;">
    <div class="form-group">
      <button class="btn btn-success">Lưu Sản Phẩm</button>
      <button class="btn btn-danger">Xóa</button>
    </div>
  </div>
</div>
</form>
</div>
</section>
<style type="text/css">
  .previewImage{
    width: 120px;
    height: 120px;
    margin: 10px;
    padding: 10px;
  }
</style>
@endsection
@section('js')
<script type="text/javascript" src="backend/js/product.js"></script>
@endsection
