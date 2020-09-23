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
					<li class="category3"><span>Quên mật khẩu</span></li>
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
				<h3 style="text-align: center;">QUÊN MẬT KHẨU</h3>
				<form action="{{ route('frontend.resetPassword')}}" method="post">
					@csrf
					<div class="form-group">
						<label for="exampleInputEmail1">Địa Chỉ Email</label>
						<input type="text" class="form-control" placeholder="Nhập địa chỉ email của tài khoản" name="userEmail" value="{{ old('userEmail') }}">
						@if($errors->has('userEmail'))
						<span class="text-danger" style="color: red;">{{ $errors->first('userEmail') }}</span>
						@endif
					</div>
					@if(Session::has("error"))
					<div class="form-group">
						<p class="alert alert-danger">{{ Session::get('error') }}</p>
					</div>
					@elseif(Session::has("success"))
					<div class="form-group">
						<p class="alert alert-success">{{ Session::get('success') }}</p>
					</div>
					@endif
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Tiếp Tục</button>
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
		width: 50%;
		margin: 0 auto;
		border: 1px solid #ccc;
		padding: 20px;
		border-radius: 15px;
		margin-bottom: 20px;
	}
</style>