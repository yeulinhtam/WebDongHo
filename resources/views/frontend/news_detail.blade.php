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
						<li class="category3"><span>Tin tức</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="news-area">
	<div class="container">
		<div class="row news">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="news-title">
					<h2>{{ $data->name }}</h2>
				</div>
				<div class="news-image">
					<img src="../storage/app/public/news/{{ $data->image }}" width="100%" height="300px;">
				</div>
				<div class="news-content">
					{!! $data->description !!}
				</div>
				<div class="news-readmore">
					<p>Xem Thêm: </p>
					<ul>
						@foreach($readmore as $key => $value)
						<li><a href="{{ route('frontend.newsDetail',$value->id) }}"> {{ $value->name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-sm-2"></div>
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
	.news{
		margin-top: 20px;
		margin-bottom: 200px;
	}

	.news .col-sm-8{
		padding-bottom: 20px;
		border-bottom: 1px solid #ccc;
	}

	.news-title{
		color: black;
		margin-bottom: 50px;	
	}

	.news-title h2{
		font-size:38px; 
	}

	.news-image{
		margin-bottom: 25px;
	}

	.news-readmore p{
		color: black;
		font-size: 20px;
	}
	.news-readmore ul{
		list-style-type: disc;
		margin-left: 40px;
	}

	.news-readmore a {
		font-size: 16px;
		color: #288ad6;
	}

	.news-readmore a:hover {
		color: red;
	}


	.news-readmore li{
		padding-bottom: 5px;
	}
</style>