@extends('frontend.master')
@section('js-bootstrap-header')
<link rel="shortcut icon" type="image/x-icon" href="frontend/img/favicon.ico">
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="frontend/css/bootstrap.min.css">
<link rel="stylesheet" href="frontend/css/owl.carousel.css">
<link rel="stylesheet" href="frontend/css/owl.theme.css">
<link rel="stylesheet" href="frontend/css/owl.transitions.css">
<link rel="stylesheet" href="frontend/css/font-awesome.min.css">
<link rel="stylesheet" href="frontend/fonts/font-icon.css">
<link rel="stylesheet" href="frontend/custom-slider/css/nivo-slider.css" type="text/css" />
<link rel="stylesheet" href="frontend/custom-slider/css/preview.css" type="text/css" media="screen" />
<link rel="stylesheet" href="frontend/css/animate.css">
<link rel="stylesheet" href="frontend/css/meanmenu.min.css">
<link rel="stylesheet" href="frontend/css/normalize.css">
<link rel="stylesheet" href="frontend/css/main.css">
<link rel="stylesheet" href="frontend/style.css">
<link rel="stylesheet" href="frontend/css/responsive.css">
<script src="frontend/js/vendor/modernizr-2.8.3.min.js"></script>
@endsection
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="container-inner">
					<ul>
						<li class="home">
							<a href="{{ route('frontend.home') }}">Trang chủ</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>
						<li class="category3"><span>Đăng ký</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="loginform">
					<h3 style="text-align: center;">ĐĂNG KÝ</h3>
					<form action="{{ route('frontend.signup')}}" method="post">
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
@endsection
@section('js-bootstrap-footer')
<script src="frontend/js/vendor/jquery-1.11.3.min.js"></script>       
<script src="frontend/js/bootstrap.min.js"></script>
<script src="frontend/custom-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="frontend/custom-slider/home.js" type="text/javascript"></script>
<script src="frontend/js/owl.carousel.min.js"></script>
<script src="frontend/js/jquery.scrollUp.min.js"></script>
<script src="frontend/js/price-slider.js"></script>
<script src="frontend/js/jquery.elevateZoom-3.0.8.min.js"></script>
<script src="frontend/js/jquery.bxslider.min.js"></script>
<script src="frontend/js/jquery.meanmenu.js"></script>
<script src="frontend/js/wow.js"></script>
<script src="frontend/js/plugins.js"></script>       
<script src="frontend/js/main.js"></script>
@endsection

<style type="text/css">
	.loginform{
		width: 70%;
		margin: 0 auto;
		border: 1px solid #ccc;
		padding: 20px;
		border-radius: 15px;
		margin-bottom: 20px;
		min-height: 600px;
	}
</style>