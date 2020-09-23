@extends('backend.master')
@section('wrapper-header')
<section class="content-header">
  <h1>
    Tài Khoản
    <small>Danh Sách</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Tài khoản</li>
    <li>Danh sách</li>
  </ol>

  <div class="row" style="padding: 15px;">
   <a  href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Mới</a>
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
          <th>Tên Tài Khoản</th>
          <th>Email</th>
          <th>Trạng Thái</th>
          <th>Cập Nhật</th>
          <th>Hành Động</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $key => $value)
        <tr>
          <td>{{ $key + $data->firstItem()  }}</td>
          <td>{{ $value->username }}</td>
          <td>{{ $value->email }}</td>
          <td>
            @if($value->blocked == 0)
            <a href="{{ route('user.active', $value->id) }}">
             <span class="label label-success">Active</span>
           </a>
           @elseif($value->blocked == 1)
           <a href="{{ route('user.active', $value->id) }}">
             <span class="label label-danger">Block</span>
           </a>
           @endif
         </td> 
         <td>{{ $value->updated_at }}</td>
         <td>
          <form action="{{ route('user.destroy',$value->id) }}" id="userForm{{$value->id}}" method="POST" style="float: left; padding-right: 10px;">
            @method('DELETE')
            @csrf
            <a class="label label-danger" onclick="deleteUser('{{$value->id}}')">Xóa</a>
          </form>
          <a href="{{ route('user.edit',$value->id) }}" class="label label-primary">Chỉnh Sửa</a>
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
  function deleteUser(id){
    var confirmation = confirm("Bạn có chắc chắn muốn xóa tài khoản này!");
    if(confirmation){
      var form = document.getElementById("userForm" + id).submit();
    }
  }
</script>

