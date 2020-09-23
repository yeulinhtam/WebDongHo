@extends('backend.master')
@section('wrapper-header')
<section class="content-header">
  <h1>
    Tài Khoản
    <small style="color: red;">Thêm mới</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li>Tài Khoản</li>
    <li class="active">Thêm Mới</li>
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
        <form action="{{ route('user.store')}}" method="post">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="userName">Tên Tài Khoản</label>
              <input type="text" class="form-control" name="userName" placeholder="Tên tài khoản" value="{{ old('userName') }}">
              @if($errors->has('userName'))
              <span class="text-danger">{{ $errors->first('userName') }}</span>
              @endif 
            </div>
            <div class="form-group col-md-6">
              <label for="userEmail">Email</label>
              <input type="email" class="form-control" name="userEmail" placeholder="Địa chỉ email" value="{{ old('userEmail') }}">
              @if($errors->has('userEmail'))
              <span class="text-danger">{{ $errors->first('userEmail') }}</span>
              @endif 
            </div>
          </div>
          <div class="form-group">
            <div class="form-group col-md-12">
              <label for="userPassword">Mật Khẩu</label>
              <input type="password" class="form-control" name="userPassword" placeholder="Mật khẩu">
              @if($errors->has('userPassword'))
              <span class="text-danger">{{ $errors->first('userPassword') }}</span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <div class="form-group col-md-12">
              <label for="userRePassword">Xác Nhận Mật Khẩu</label>
              <input type="password" class="form-control" name="userRePassword" placeholder="Xác nhận mật khẩu">
              @if($errors->has('userRePassword'))
              <span class="text-danger">{{ $errors->first('userRePassword') }}</span>
              @endif
              
            </div>
          </div>
         <div class="form-row">
          <div class="form-group col-md-6">
            <label for="userFullName">Họ Tên</label>
            <input type="text" class="form-control" name="userFullName" placeholder="Họ tên" value="{{ old('userFullName') }}">
            @if($errors->has('userFullName'))
            <span class="text-danger">{{ $errors->first('userFullName') }}</span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="userPhone">Số Điện Thoại</label>
            <input type="text" class="form-control" name="userPhone" placeholder="Số điện thoại" value="{{ old('userPhone') }}">
            @if($errors->has('userPhone'))
            <span class="text-danger">{{ $errors->first('userPhone') }}</span>
            @endif

          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="userAddress">Địa chỉ</label>
            <input type="text" class="form-control" name="userAddress" placeholder="Địa chỉ" value="{{ old('userAddress') }}">
            @if($errors->has('userAddress'))
            <span class="text-danger">{{ $errors->first('userAddress') }}</span>
            @endif
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">  
            <button type="submit" class="btn btn-primary">Đăng Ký</button>
            <button type="reset" class="btn btn-danger">Hủy Bỏ</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
<style type="text/css">
  .previewImage{
    width: 520px;
    height:250px;
    margin-bottom: 10px;
    border:1px solid #ccc;
  }
</style>
</section>
@endsection
@section('js')
<script type="text/javascript" src="backend/js/product.js"></script>
@endsection




