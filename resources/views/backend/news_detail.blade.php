@extends('backend.master')
@section('wrapper-header')
<section class="content-header">
  <h1>
    Tin Tức
    <small style="color: red;">Chi tiết</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Tin tức</li>
    <li class="active">Chi tiết</li>
  </ol>
</section>
@endsection 
<!-- content  -->
@section('wrapper-content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="form-group">
           <label for=inputTitle>Title:</label>
           <p class="form-control">{{ $data['name'] }}</p> 
          </div>
         
         <div class="form-group">    
           <label for="inputStatus">Trạng thái:</label>
           @if($data->status == 1)
           <p class="form-control">Mở</p> 
           @elseif($data->status == 0)
           <p class="form-control">Khóa</p> 
           @endif
         </div>

         <div class="form-group">
          <label for="inputImage">Hình ảnh</label>
          <div class="gallery">
              <img src="../storage/app/public/news/{{ $data->image }}" width="350px" height="160px">
          </div>
        </div>

        <div class="form-group">
         <label for="inputDescription">Mô tả</label>
         <textarea name=description id="text" cols="3">{{ $data->description }}</textarea>
         <script>
          CKEDITOR.replace( 'text', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
          } );
        </script>
        @include('ckfinder::setup')                 
      </div>

    </form>

  </div>
</div>
</div>
</section>
@endsection

@section('js')
<script type="text/javascript" src="backend/js/product.js"></script>
@endsection




