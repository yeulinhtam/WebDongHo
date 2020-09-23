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

  <form class="content-fillter" method="get" action="{{ route('product.search')}}">
   <div class="row">
    <input type="text" placeholder="Tìm kiếm" class="form-filter" name="key" @if(request()->key) value="{{ request()->key }}" @endif>
    <select class="form-filter" name="option">
      <option value="0">Chọn loại sản phẩm</option>
      @foreach($category as $key => $value)
          @if(request()->option == $value->id)
            <option value="{{ $value->id }}" selected="">{{ $value->categoryName }}</option>
          @else
            <option value="{{ $value->id }}">{{ $value->categoryName }}</option>
          @endif
     @endforeach
   </select>
   <button class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i> Tìm Kiếm</button>
   <a  href="{{ route('product.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Mới</a>
 </div> 
</form>

</section>
@endsection
<!-- content  -->

@section('wrapper-content')
<section class="content">
 @include('error.note')
 <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên SP</th>
        <th>Danh Mục</th>
        <th>Hình Ảnh</th>
        <th>Giá Gốc</th>
        <th>Hot</th>
        <th>New</th>
        <th>Trạng Thái</th>
        <th>Hành Động</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $key => $value)
      <tr>
        <td>{{ $key + $data->firstItem()  }}</td>
        <td><a href="{{ route('product.show',$value->slug) }}">{{ $value->name }}</a></td>
        <td>{{ $value->categoryName}}</td>
        <td><img src="../storage/app/public/product/{{ $value->image }}" width="60px" height="60px"></td>
        <td>
          @if($value->promotion > 0)
          <li class="old-price">{{ number_format($value->price) }} vnđ</li>
          <li>{{ number_format( round(($value->price * (100 - $value->promotion) / 100),-3) ) }} vnđ</li>
          @else
          <li>{{ number_format($value->price) }} vnđ</li>
          @endif
        </td>
        <td>
         @if($value->hot == 1)
         <a href="{{ route('product.hot', $value->id) }}">
           <span class="label label-success">Hot</span>
         </a>
         @elseif($value->hot == 0)
         <a href="{{ route('product.hot', $value->id) }}">
           <span class="label label-danger">None</span>
         </a>
         @endif
       </td>
       <td>
        @if($value->new == 1)
        <a href="{{ route('product.new', $value->id) }}">
         <span class="label label-success">New</span>
       </a>
       @elseif($value->new == 0)
       <a href="{{ route('product.new', $value->id) }}">
         <span class="label label-danger">None</span>
       </a>
       @endif
     </td>
     <td>
       @if($value->status == 1)
       <a href="{{ route('product.active', $value->id) }}">
         <span class="label label-success">Active</span>
       </a>
       @elseif($value->status == 0)
       <a href="{{ route('product.active', $value->id) }}">
         <span class="label label-danger">Block</span>
       </a>
       @endif
     </td> 
     <td>
      <a href="{{ route('product.edit',$value->id) }}" class="label label-primary">Chỉnh Sửa</a>
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
    {{ $data->appends(['key' => request()->key,'option'=>request()->option])->links() }}
  </div> 
</div> 
</section>
@endsection



<style type="text/css">

  .content-fillter{
    padding:25px 15px 0px 15px;
  }

  .form-filter{
    width: 20%;
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    vertical-align: middle;
    border: 1px solid #ccc;
    border-radius: 4px;
  }


  .content li{
    display: block;
  }

  .old-price{
   text-decoration: line-through;
 }
</style>