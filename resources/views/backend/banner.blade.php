@extends('backend.master')
@section('wrapper-header')
<section class="content-header">
  <h1>
    Banner Quảng Cáo
    <small style="color:red;">Danh Sách</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Banner</li>
    <li>Danh sách</li>
  </ol>
   <div class="row" style="padding: 15px;">
   <a  href="{{ route('banner.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Mới</a>
 </div>
</section>
@endsection

@section('wrapper-content')
<section class="content">
  @include('error.note')
  <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Title</th>
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
          <td>{{ $value->name }}</td>
          <td>
            <img src="../storage/app/public/banner/{{ $value->image }}" style="width: 225px; height: 60px;">
          </td>
          <td>
           @if($value->status == 1)
           <a href="{{ route('banner.active', $value->id) }}">
             <span class="label label-success">Active</span>
           </a>
           @elseif($value->status == 0)
           <a href="{{ route('banner.active', $value->id) }}">
             <span class="label label-danger">Block</span>
           </a>
           @endif
         </td> 
         <td>{{ $value->updated_at }}</td>
         <td>
          <form action="{{ route('banner.destroy',$value->id) }}" id="bannerForm{{$value->id}}" method="POST" style="float: left; padding-right: 10px;">
            @method('DELETE')
            @csrf
            <a class="label label-danger" onclick="deleteBanner('{{$value->id}}')">Xóa</a>
          </form>
          <a href="{{ route('banner.edit',$value->id) }}" class="label label-primary">Chỉnh Sửa</a>
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

<script type="text/javascript">
  function deleteBanner(id){
   var confirmation = confirm("Bạn có chắn chắn muốn xóa banner này không?");
    if(confirmation){
      var form = document.getElementById("bannerForm" + id).submit();   
    }
  }
</script>



