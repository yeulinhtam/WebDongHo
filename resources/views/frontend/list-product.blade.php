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
<link rel="stylesheet" type="text/css" href="frontend/css/list-product.css">
<script src="frontend/js/vendor/modernizr-2.8.3.min.js"></script>
@endsection



@section('content')
<div class="our-product-area" style="margin-bottom: 50px;">
	<div class="container">
		<div class="manu manu14" style="padding-top: 30px;">
			@foreach($producer as $key => $value)
			<a href="{{ route('frontend.category.producer',[$slugCategory, $value->slug]) }}" class="">
				<img src="../storage/app/public/producer/{{ $value->logo}}">
			</a>
			@endforeach
		</div>

		<div class="fillter-product">
			<div class="row">
				<ul class="filter">
					<li class="title">Chọn mức giá</li>
					<li class="frange">
						<a href="{{url()->current()}}?p=duoi-1-trieu">Dưới 1 triệu</a>
						<a href="{{url()->current()}}?p=tu-1-3-trieu">Từ 1 - 3 triệu</a>
						<a href="{{url()->current()}}?p=tu-3-7-trieu">Từ 3 - 7 triệu</a>
						<a href="{{url()->current()}}?p=tren-7-trieu">Trên 7 triệu</a>
					</li>
					<li>
						<div class="dropdown">
							<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Sắp Xếp
							</button>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
								@if(request()->p)
								<a class="dropdown-item"
								href="{{url()->current()}}?p={{request()->p}}&sort=san-pham-hot">Nổi bật nhất</a>
								<a class="dropdown-item"
								href="{{url()->current()}}?p={{request()->p}}&sort=cao-den-thap">Giá cao đến thấp</a>
								<a class="dropdown-item" 
								href="{{url()->current()}}?p={{request()->p}}&sort=thap-den-cao">Giá thấp đến cao</a>
								@else
								<a class="dropdown-item" href="{{url()->current()}}?sort=san-pham-hot">Nổi bật nhất</a>
								<a class="dropdown-item" href="{{url()->current()}}?sort=cao-den-thap">Giá cao đến thấp</a>
								<a class="dropdown-item" href="{{url()->current()}}?sort=thap-den-cao">Giá thấp đến cao</a>
								@endif
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			@foreach($product as $key => $value)	
			<div class="col-sm-15">
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
						<h2 class="product-name"><a href="{{ route('frontend.product',$value->slug) }}">{{ $value->name }}</a></h2>
						<p class="new-price">{{ number_format( round(($value->price * (100 - $value->promotion) / 100),-3) ) }}đ</p>
						<p class="old-price">{{ number_format($value->price) }}đ</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>	
		<div class="row">
			<div class="paginate-product" style="float: right;"> 
				{{ $product->appends(['p' => request()->p,'sort'=>request()->sort])->links() }}
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
