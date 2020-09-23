@extends('backend.master')
@section('wrapper-header')
<section class="content-header">
  <h1>
    Tin Tức
    <small style="color: red;">Thêm mới</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Tin tức</li>
    <li class="active">Thêm mới</li>
  </ol>
</section>
@endsection 
<!-- content  -->
@section('wrapper-content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        <form action="{{ route('news.update',$data->id) }}" method="POST" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="form-group">
           <label for=inputTitle>Title</label>
           <input type="text" class="form-control" id="inputTitle"  name="name" placeholder="Title tin tức" value="{{ $data->name }}">
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
          <label for="inputLogo">Hình ảnh</label>
          <div class="gallery">
            <img src="../storage/app/public/news/{{ $data->image }}" class="previewImage" width="100px;" height="100px;" style="border: 1px solid #ccc;">
          </div>
          <input type="file" class="form-control" id="gallery-photo-add" name="image">
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
        @if($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif                 
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Lưu Tin Tức</button>
      </div>
    </form>

  </div>
</div>
</div>
<style type="text/css">
  .previewImage{
    width: 150px;
    height:80px;
    margin-bottom: 10px;
    border:1px solid #ccc;
  }
</style>
</section>
@endsection
@section('js')
<script type="text/javascript" src="backend/js/product.js"></script>
@endsection




