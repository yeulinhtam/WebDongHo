@extends('backend.master')

@section('title')
<title>Trang quản trị</title>
@endsection

@section('wrapper-header')
<section class="content-header">
  <h1>
    Nhà Cung Cấp
    <small style="color: red;">Cập nhật</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Nhà cung cấp</li>
    <li class="active">Cập nhật</li>
  </ol>
</section>
@endsection 

<!-- content  -->
@section('wrapper-content')
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form action="{{ route('producer.update',$data->id) }}" method="post" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="form-group">
           <label for=inputCategory>Tên Nhà Cung Cấp</label>
           <input type="text" class="form-control" id="inputCategory"  name="name" placeholder="Tên Category" value="{{ $data->name }}">
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
            <img src="../storage/app/public/producer/{{ $data->logo }}" class="previewImage">
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
    height: 45px;
    margin-bottom: 10px;
    border:1px solid #ccc;
  }
</style>
</section>
@endsection

@section('js')
<script type="text/javascript" src="backend/js/product.js"></script>
@endsection


