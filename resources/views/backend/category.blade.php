@extends('backend.master')
@section('wrapper-header')
<section class="content-header">
  <h1>
    Loại Sản Phẩm
    <small>Danh Sách</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Loại sản phẩm</li>
    <li>Danh sách</li>
  </ol>
   <div class="row" style="padding: 15px;">
   <a  href="{{ route('category.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Mới</a>
 </div>
</section>
@endsection

@section('wrapper-content')
<section class="content">
  <!-- <a href="{{ route('category.create') }}"><button class="btn btn-success my-7 my-sm-0">Thêm mới</button></a> -->
  @include('error.note')
  <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Danh Mục</th>
          <th>Hình Ảnh</th>
          <th>Trạng Thái</th>
          <th>Cập Nhật</th>
          <th>Hành Động</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $key => $value)
        <tr>
          <td>{{ $key + $data->firstItem()  }}</td>
          <td>{{ $value->categoryName }}</td>
          <td>
            <img src="../storage/app/public/category/{{ $value->logo }}" style="width: 60px; height: 60px;">
          </td>
          <td>
           @if($value->status == 1)
           <a href="{{ route('category.active', $value->id) }}">
             <span class="label label-success">Active</span>
           </a>
           @elseif($value->status == 0)
           <a href="{{ route('category.active', $value->id) }}">
             <span class="label label-danger">Block</span>
           </a>
           @endif
         </td> 
         <td>{{ $value->updated_at }}</td>
         <td>
          <!-- <form action="{{ route('category.destroy',$value->id) }}" method="POST" style="float: left; padding-right: 10px;" id="myForm">
            @method('DELETE')
            @csrf
            <a onclick="document.getElementById('myform').submit()" class="label label-danger">Xóa</a>
          </form> -->
          <a href="{{ route('category.edit',$value->id) }}" class="label label-primary">Chỉnh Sửa</a>
        </td>
      </tr>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<div class="row">
  <div class="col-sm-9"></div>
  <div class="col-sm-3">
     {{ $data->links() }}
  </div> 
</div> 
</section>
@endsection



