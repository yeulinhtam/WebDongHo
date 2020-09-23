@extends('backend.master')
@section('wrapper-header')
<section class="content-header">
  <h1>
    Tin Tức
    <small style="color:red;">Danh Sách</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Tin tức</li>
    <li>Danh sách</li>
  </ol>
   <div class="row" style="padding: 15px;">
   <a  href="{{ route('news.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Mới</a>
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
          <th style="width: 250px;">Title</th>
          <th>Logo</th>
          <th>Trạng Thái</th>
          <th>Cập Nhật</th>
          <th>Hành Động</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $key => $value)
        <tr>
          <td>{{ $key + $data->firstItem()  }}</td>
          <td style="width: 300px"><a href="{{ route('news.show',$value->id) }}">{{ $value->name }}</a></td>
         <td>
            <img src="../storage/app/public/news/{{ $value->image }}" style="width: 100px; height: 70px;">
          </td>
          <td>
           @if($value->status == 1)
           <a href="{{ route('news.active', $value->id) }}">
             <span class="label label-success">Active</span>
           </a>
           @elseif($value->status == 0)
           <a href="{{ route('news.active', $value->id) }}">
             <span class="label label-danger">Block</span>
           </a>
           @endif
         </td> 
         <td>{{ $value->updated_at }}</td>
         <td>
          <form action="{{ route('news.destroy',$value->id) }}" id="newsForm{{$value->id}}" method="POST" style="float: left; padding-right: 10px;">
            @method('DELETE')
            @csrf
            <a class="label label-danger" onclick="deleteNews('{{ $value->id }}')">Xóa</a>
          </form>
          <a href="{{ route('news.edit',$value->id) }}" class="label label-primary">Chỉnh Sửa</a>
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
  function deleteNews(id){
   var confirmation = confirm("Bạn có chắn chắn muốn tin tức này không?");
    if(confirmation){
      var form = document.getElementById("newsForm" + id).submit();   
    }
  }
</script>