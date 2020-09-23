@extends('backend.master')
@section('wrapper-header')
<section class="content-header">
  <h1>
    Sản Phẩm
    <small style="color: red;">Danh Sách</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Sản phẩm</li>
    <li class="active">Danh sách</li>
  </ol>
</section>
@endsection
<!-- content  -->
@section('wrapper-content')


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
         <label for=inputName>Tên Sản Phẩm</label>
         <input class="form-control" id="inputName" value="{{ $data->name }}" readonly="">
        </div>
        <div class="form-group">
         <label>Hình ảnh</label>
        <div class="gallery">
          @foreach($image as $key => $value)
          <img src="../storage/app/public/product/{{ $value->image }}" class="previewImage">
          @endforeach
        </div>
        </div> 
      <div class="form-group">
       <label for="inputDescription">Mô Tả</label>
       <textarea name=description id="text" cols="3">
         {{ $data->description}}
       </textarea>
       <script>
        CKEDITOR.replace( 'text', {
          filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        } );
      </script>
      @include('ckfinder::setup')                 
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
     @foreach($category as $key)
     @if($data->id_category == $key->id) 
     <input class="form-control" value="{{ $key->categoryName }}" readonly=""> 
     @endif
     @endforeach
 </div>
 <div class="form-group">
   <label for="inputProducer">Nhà Cung Cấp</label>
     @foreach($producer as $key)
     @if($data->id_producer == $key->id) 
     <input class="form-control" value="{{ $key->name }}" readonly=""> 
     @endif
     @endforeach
 </div>
 <div class="form-group">
  <label for="inputPrice">Giá Sản Phẩm</label>
  <input class="form-control" value="{{ number_format($data->price) }} đ" readonly="">
</div>
<div class="form-group">
  <label for="inputPromotion">% Khuyến Mãi</label>
  <input class="form-control" value="{{ $data->promotion }} %" readonly="">
</div>
<div class="form-group">
  <label>Số lượng sản phẩm</label>
  <input class="form-control" value="{{ $data->quantity }}" readonly="">
</div>
<div class="form-group">
  <label class="radio-inline">
    <input type="checkbox" name="hot" value="1" @if($data->hot == 1) {{ 'checked' }} @endif> Sản phẩm nổi bật   
  </label>
  <label class="radio-inline">
    <input type="checkbox" name="new" value="1" @if($data->new == 1) {{ 'checked' }} @endif>  Sản phẩm mới
  </label>
</div>

</div>
</div>
<div class="row">
  <div class="col-md-12" style="padding-bottom: 50px;">
    <div class="form-group">
     <!--  <button class="btn btn-success">Lưu Sản Phẩm</button>
      <button class="btn btn-danger">Xóa</button> -->
    </div>
  </div>
</div>
</div>
</section>

<style type="text/css">
  .previewImage{
    width: 120px;
    height: 120px;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
  }
</style>

@endsection
@section('js')
<script type="text/javascript" src="backend/js/product.js"></script>
@endsection
