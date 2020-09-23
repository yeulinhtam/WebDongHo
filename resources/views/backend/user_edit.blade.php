@extends('backend.master')
@section('wrapper-header')
<section class="content-header">
  <h1>
    Tài Khoản
    <small style="color: red;">Chỉnh sửa</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Tài khoản</li>
    <li class="active">Chỉnh sửa</li>
  </ol>
</section>
@endsection 
<!-- content  -->
@section('wrapper-content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
     <div class="col-md-12">
      <div class="loginform">
        <form action="{{ route('user.update',$user->id)}}" method="post">
           @method('PATCH')
          @csrf
         <div class="form-row">
          <div class="form-group col-md-6">
            <label for="userFullName">Họ Tên</label>
            <input class="form-control" name="userFullName" placeholder="Họ tên" value="{{ $user->fullname }}">
            @if($errors->has('userFullName'))
            <span class="text-danger">{{ $errors->first('userFullName') }}</span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="userPhone">Số Điện Thoại</label>
            <input class="form-control" name="userPhone" placeholder="Số điện thoại" value="{{ $user->phone }}">
            @if($errors->has('userPhone'))
            <span class="text-danger">{{ $errors->first('userPhone') }}</span>
            @endif

          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="userAddress">Địa chỉ</label>
            <input type="text" class="form-control" name="userAddress" placeholder="Địa chỉ" value="{{ $user->address }}">
            @if($errors->has('userAddress'))
            <span class="text-danger">{{ $errors->first('userAddress') }}</span>
            @endif
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">  
            <button type="submit" class="btn btn-primary">Lưu Thông Tin</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</section>
@endsection
@section('js')
<script type="text/javascript" src="backend/js/product.js"></script>
@endsection




