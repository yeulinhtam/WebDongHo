@extends('backend.master')
@section('wrapper-header')
<section class="content-header">
  <h1>
    Đơn Hàng
    <small style="color: red;">Chi Tiết </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Đơn hàng</li>
    <li class="active">Chi tiết</li>
  </ol>

  <div class="toggle-info-bill">
    <button class="btn btn-info" id="toggle-button" onclick="toggleBill()">Chi tiết đơn hàng</button>
  </div>
  <div class="bill-info" id="bill-info" style="display: none;">
   <div class="bill-row">
     <p>Người nhận hàng: <span>{{ $bill->name }}</span></p>
   </div>
   <div class="bill-row">
     <p>Tổng thanh toán: <span>{{ number_format($bill->total) }} đ</span></p>
   </div>
   <div class="bill-row">
     <p>Địa chỉ email: <span>{{ $bill->email }}</span></p>
   </div>
   <div class="bill-row">
    <p>Số điện thoại: <span>{{ $bill->phone }}</span></p>
  </div>
  <div class="bill-row">
   <p>Địa chỉ: <span>{{ $bill->address }}</span>
   </div>
   <div class="bill-row">
     <p>Ghi chú: <span>{{ $bill->note }}</span></p>
   </div>

 </div>
</section>
@endsection
<!-- content  -->

@section('wrapper-content')
<section class="content" style="clear: both;">
 @include('error.note')
 <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên Sản Phẩm</th>
        <th>Hình Ảnh</th>
        <th>Số Lượng</th>
        <th>Đơn Giá</th>
        <th>Thành Tiền</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $key => $value)
      <tr>
       <td>{{ $key + $data->firstItem()  }}</td>
       <td>{{ $value->name }}</td>
       <td><img src="../storage/app/public/product/{{ $value->image }}" width="60px" height="60px"></td>
       <td>{{ $value->quantity }}</td>
       <td>{{ number_format($value->price / $value->quantity) }} đ</td>
       <td>{{ number_format($value->price) }} đ</td>
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



<style type="text/css">

  .content-fillter{
    padding:25px 15px 0px 15px;
  }


  .toggle-info-bill{
    padding-top: 10px;
  }
  .bill-info{
    padding-top: 10px;
    width: 70%;
  }

  .bill-row{
    float: left;
    width: 50%;
  }

</style>

<script type="text/javascript">
  function toggleBill(){
   var x = document.getElementById("bill-info");
   if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

}

</script>
