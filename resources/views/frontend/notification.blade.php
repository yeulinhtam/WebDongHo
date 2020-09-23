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
						<li class="category3"><span>Thông Báo</span></li>
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
				<div class="notification">
					@if(Session::has("success"))
					<div class="form-group">
						<p class="alert alert-success">{{ Session::get('success') }}</p>
					</div>
					@elseif(Session::has("error"))
					<div class="form-group">
						<p class="alert alert-danger">{{ Session::get('danger') }}</p>
					</div>
					@endif
					<div class="form-group" style="padding-top: 20px;">
						<p style="color: black;">Bạn sẽ được trở về trang chủ trong <span id="time">10</span>s</p>
					</div>
					<div class="form-group">
						<a class="btn btn-danger" href="{{ route('frontend.home') }}">Trở về trang chủ</a>
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
		.form-group{
			height: 40px;
			margin: 0 auto;
		}

		.notification{
			margin-bottom: 50px;
		}
	</style>

	<script type="text/javascript">
		var myVar = setInterval(myTimer, 1000);
		var total = 10;
		function myTimer() {
			var t = total - 1;
			total--;
			if(t == 0){
				window.location.href = "{{ route('frontend.home') }}";
			}
			document.getElementById("time").innerHTML = t;
		}
	</script>