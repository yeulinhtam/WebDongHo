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

@section('slider')
@include('frontend.slider')
@endsection

@section('content')
<!-- product section start -->
<div class="our-product-area">
<div class="container">
	<div class="area-title">
		<h2>SẢN PHẨM GIÁ TỐT</h2>
	</div>
	@foreach($sale->chunk(4) as $items)
	<div class="row">
		@foreach($items as $value)	
		<div class="col-sm-3">
			<div class="single-product">
				<div class="product-img">
					<a href="{{ route('frontend.product',$value->slug) }}">
						@if($value->promotion > 0)
						<span class="labelshock-top">-{{ $value->promotion }}%</span>
						@endif
						<img class="primary-image" src="../storage/app/public/product/{{ $value->image}}" alt="" />
					</a>
				</div>
				<div class="product-content">
					<h2 class="product-name"><a href="{{route('frontend.product',$value->slug)}}">{{ $value->name }}</a></h2>
					<p class="new-price">{{ number_format( round(($value->price * (100 - $value->promotion) / 100),-3) ) }}đ</p>
					<p class="old-price">{{ number_format($value->price) }}đ</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@endforeach	
</div>
</div>
<div class="our-product-area new-product">
<div class="container">
	<div class="area-title">
		<h2>SẢN PHẨM HOT</h2>
	</div>
	@foreach($hot->chunk(4) as $items)
	<div class="row">
		@foreach($items as $value)	
		<div class="col-sm-3">
			<div class="single-product">
				<div class="product-img">
					<a href="{{ route('frontend.product',$value->slug) }}">
						@if($value->promotion > 0)
						<span class="labelshock-top">-{{ $value->promotion }}%</span>
						@endif
						<img class="primary-image" src="../storage/app/public/product/{{ $value->image}}" alt="" />
						<img class="secondary-image" src="../storage/app/public/product/{{ $value->image}}" alt="" />
					</a>
				</div>
				<div class="product-content">
					<h2 class="product-name"><a href="{{route('frontend.product',$value->slug)}}">{{ $value->name }}</a></h2>
					<p class="new-price">{{ number_format( round(($value->price * (100 - $value->promotion) / 100),-3) ) }}đ</p>
					<p class="old-price">{{ number_format($value->price) }}đ</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@endforeach	
</div>
</div>
@endsection

@section("news")
@include("frontend.news")
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
.labelshock-top{
vertical-align: middle;
position: absolute;
z-index: 3;
right: 0;
top: 5px;
color: #fff;
font-weight: 600;
background: #f51212;
border-radius: 3px;
padding: 3px 8px;
margin: 1px 10px 0 5px;
height: 18px;
text-decoration: none;
font-size: 11px;
}
</style>