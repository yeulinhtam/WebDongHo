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

  <form class="content-fillter" method="get" action="{{ route('bill.search')}}">
   <div class="row">
     <input type="text" placeholder="Tìm kiếm đơn hàng" class="form-filter" name="key" @if(request()->key) value="{{ request()->key }}" @endif>
     <select class="form-filter" name="filter">
       <option value="0" @if(request()->filter == 0) selected="" @endif>Lọc đơn hàng</option>
       <option value="1" @if(request()->filter == 1) selected="" @endif>Theo mã đơn hàng</option>
       <option value="2" @if(request()->filter == 2) selected="" @endif>Theo số điện thoại</option>
       <option value="3" @if(request()->filter == 3) selected="" @endif>Theo email đặt hàng</option> 
     </select>
     <select class="form-filter" name="status">
      <option value="-1" @if(request()->status == -1) selected="" @endif>Tình trạng đơn hàng</option>
      <option value="1"  @if(request()->status == 1) selected="" @endif>Đang xử lý</option>
      <option value="2"  @if(request()->status == 2) selected="" @endif>Đang vận chuyển</option>
      <option value="3"  @if(request()->status == 3) selected="" @endif>Thành công</option>
      <option value="4"  @if(request()->status == 4) selected="" @endif>Đã hủy</option> 
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
 <div class="table-responsive" style="overflow-x: unset;">          
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã Đơn Hàng</th>
        <th>Thông Tin</th>
        <th>Tổng Tiền</th>
        <th>Trạng Thái</th>
        <th>Hành Động</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $key => $value)
      <tr>
        <td>{{ $key + $data->firstItem()  }}</td>
        <td>{{ $value->id }}</td>
        <td>
          <ul class="infoBill">
            <li>{{ $value->name }}</li>
            <li>{{ $value->email }}</li>
            <li>{{ $value->phone }}</li>
            <li>{{ $value->address }}</li>
          </ul>
        </td>
        <td>{{ number_format($value->total) }} đ</td>
        <td>
          @if($value->status == 1)
          <span class="label label-primary">Đang xử lý</span>
          @elseif($value->status == 2)
          <span class="label label-info">Đang vận chuyển</span>
          @elseif($value->status == 3)
          <span class="label label-success">Giao hàng thành công</span>
          @elseif($value->status == 4)  
          <span class="label label-danger">Đã hủy</span>
          @endif
        </td>
        
        <td>
          <div style="float: left; padding-right: 5px;">
            <a href="{{ route('bill.show',$value->id) }}">
              <span class="label label-info">Chi tiết</span>
            </a>
          </div>
          <div class="dropdown" style="float: left; padding-right: 5px;">
            <span class="label label-success dropdown-toggle" type="button" data-toggle="dropdown">Hành Động
              <span class="caret"></span></span>
              <ul class="dropdown-menu">
                <li>
                  <a href="{{ route('bill.status',$value->id) }}?status=1">
                    <i class="fa fa-spinner"></i>Đang xử lý
                  </a>
                </li>
                <li>
                  <a href="{{ route('bill.status',$value->id) }}?status=2">
                    <i class="fa fa-truck"></i>Vận chuyển
                  </a>
                </li>
                <li>
                  <a href="{{ route('bill.status',$value->id) }}?status=3">
                    <i class="fa fa-check"></i>Thành công
                  </a>
                </li>
                <li>
                  <a href="{{ route('bill.status',$value->id) }}?status=4">
                    <i class="fa fa-ban"></i>Hủy
                  </a>
                </li>
              </ul>
            </div>
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
    {{ $data->appends(['key' => request()->key,'filter'=>request()->filter,'status' => request()->status])->links() }}
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

  .infoBill{
    padding: 0px;
    display: inline-block;
  }

  .open>.dropdown-menu {
    margin-top: 10px;
  }

</style>