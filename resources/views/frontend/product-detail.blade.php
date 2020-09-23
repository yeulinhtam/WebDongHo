@extends('frontend.master')
@section('js-bootstrap-header')
<link rel="shortcut icon" type="image/x-icon" href="frontend/img/favicon.ico">
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="frontend/custom-slider/css/nivo-slider.css" type="text/css" />
<link rel="stylesheet" href="frontend/custom-slider/css/preview.css" type="text/css" media="screen" />
<link rel="stylesheet" href="frontend/css/bootstrap.min.css">
<link rel="stylesheet" href="frontend/css/owl.carousel.css">
<link rel="stylesheet" href="frontend/css/owl.theme.css">
<link rel="stylesheet" href="frontend/css/owl.transitions.css">
<link rel="stylesheet" href="frontend/css/font-awesome.min.css">
<link rel="stylesheet" href="frontend/css/meanmenu.min.css">
<link rel="stylesheet" href="frontend/fonts/font-icon.css">
<link rel="stylesheet" href="frontend/css/animate.css">
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
						<li class="category3"><span>Sản phẩm</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<!-- product-details Area Start -->
<div class="product-details-area">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-12">
				<div class="zoomWrapper">
					<div id="img-1" class="zoomWrapper single-zoom" style="border: 1px solid #ccc;">
						<a href="#">
							<img id="zoom1" src="../storage/app/public/product/{{$image[0]->image}}" data-zoom-image="../storage/app/public/product/{{$image[0]->image}}" alt="big-1">
						</a>
					</div>
					<div class="single-zoom-thumb">
						<ul class="bxslider" id="gallery_01">
							@foreach($image as $key => $value)
							<li>
								<a href="#" class="elevatezoom-gallery active" data-update="" data-image="../storage/app/public/product/{{$value->image}}" data-zoom-image="../storage/app/public/product/{{$value->image}}"><img src="../storage/app/public/product/{{$value->image}}" alt="zo-th-1"/></a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<div class="product-list-wrapper">
					<div class="single-product">
						<div class="product-content">
							<h2 class="product-name"><a href="{{ route('frontend.cart',$product->id)}}">{{ $product->name }}</a></h2>
							<div class="rating-price">	
								
								<div class="price-boxes">
									<span style="color: red;">{{ number_format( round(($product->price * (100 - $product->promotion) / 100),-3) ) }} đ</span>
									<span class="new-price" style="display: block;text-decoration: line-through; font-size: 16px;">{{ number_format($product->price) }} đ</span>
								</div>
							</div>
							@if($product->quantity - $product->quantity_out > 0)
							@if(Session::has("error"))
							<div class="alert alert-danger alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								{{ Session::get("error") }}
							</div>
							@endif
							<p class="availability in-stock">Tình trạng: <span>Còn hàng</span></p>
							<div class="actions-e">
								<div class="action-buttons-single">
									<form action="{{ route('frontend.addcart',$product->id)}}" method="get" id="formcart">
										@csrf
										<div class="inputx-content">
											<label for="qty">Số lượng:</label>
											<input type="number" name="qty" value="1" title="Qty" class="input-text qty" min="1" style="width: 50px;" required="">
										</div>
										<div class="add-to-cart">
											<button type="submit" class="btn btn-success">Thêm Vào Giỏ Hàng</button>
										</div>
									</form>
								</div>
							</div>
							@else
							<p class="availability in-stock">Tình trạng: <span>Hết hàng</span></p>
							<div class="actions-e">
								<div class="action-buttons-single">
									<form action="{{ route('frontend.addcart',$product->id)}}" method="get" id="formcart">
										@csrf
										<div class="inputx-content">
											<label for="qty">Số lượng:</label>
											<input type="number" name="qty" value="1" title="Qty" class="input-text qty" min="1" style="width: 50px;" required="">
										</div>
										<div class="add-to-cart">
											<button type="submit" class="btn btn-success" disabled>Thêm Vào Giỏ Hàng</button>
										</div>
									</form>
								</div>
							</div>

							@endif
							<div class="singl-share">
								<a href="#"><img src="frontend/img/single-share.png" alt=""></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="single-product-tab">
				<!-- Nav tabs -->
				<ul class="details-tab">
					<li class="active"><a href="#home" data-toggle="tab">Mô Tả</a></li>
					<li class=""><a href="#messages" data-toggle="tab"> Review (1)</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="product-tab-content">
							{!! $product->description !!}
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="messages">
						<div class="single-post-comments col-md-6 col-md-offset-3">
							<div class="comments-area">
								<h3 class="comment-reply-title">1 REVIEW FOR TURPIS VELIT ALIQUET</h3>
								<div class="comments-list">
									<ul>
										<li>
											<div class="comments-details">
												<div class="comments-list-img">
													<img src="frontend/img/user-1.jpg" alt="">
												</div>
												<div class="comments-content-wrap">
													<span>
														<b><a href="#">Admin - </a></b>
														<span class="post-time">October 6, 2014 at 1:38 am</span>
													</span>
													<p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.</p>
												</div>
											</div>
										</li>									
									</ul>
								</div>
							</div>
							<div class="comment-respond">
								<h3 class="comment-reply-title">Add a review</h3>
								<span class="email-notes">Your email address will not be published. Required fields are marked *</span>
								<form action="#">
									<div class="row">
										<div class="col-md-12">
											<p>Name *</p>
											<input type="text">
										</div>
										<div class="col-md-12">
											<p>Email *</p>
											<input type="email">
										</div>
										<div class="col-md-12">
											<p>Your Rating</p>
											<div class="pro-rating">
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star-o"></i></a>
												<a href="#"><i class="fa fa-star-o"></i></a>
											</div>
										</div>
										<div class="col-md-12 comment-form-comment">
											<p>Your Review</p>
											<textarea id="message" cols="30" rows="10"></textarea>
											<input type="submit" value="Submit">
										</div>
									</div>
								</form>
							</div>						
						</div>
					</div>
				</div>					
			</div>
		</div>
	</div>
</div>
<!-- product-details Area end -->
<!-- product section start -->
<div class="our-product-area new-product">
	<div class="container">
		<div class="area-title">
			<h2>SẢN PHẨM TƯƠNG TỰ</h2>
		</div>
		<div class="row">
			@foreach($sameProduct as $key => $value)	
			<div class="col-sm-3">
				<div class="single-product">
					<div class="product-img">
						<a href="{{ route('frontend.product',$value->id)}}">
							@if($value->promotion > 0)
							<span class="labelshock-top">-{{ $value->promotion }}%</span>
							@endif
							<img class="primary-image" src="../storage/app/public/product/{{ $value->image}}" alt="" />
						</a>
					</div>
					<div class="product-content">
						<h2 class="product-name"><a href="{{ route('frontend.product',$value->id)}}">{{ $value->name }}</a></h2>
						<p class="new-price">{{ number_format( round(($value->price * (100 - $value->promotion) / 100),-3) ) }}đ</p>
						<p class="old-price">{{ number_format($value->price) }}đ</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>	
	</div>
</div>
@endsection
@section('js-bootstrap-footer')
<script src="frontend/js/vendor/jquery-1.11.3.min.js"></script>
<script src="frontend/js/bootstrap.min.js"></script>
<script src="frontend/js/owl.carousel.min.js"></script>
<script src="frontend/js/price-slider.js"></script>
<script src="frontend/js/jquery.elevateZoom-3.0.8.min.js"></script>
<script src="frontend/js/jquery.meanmenu.js"></script>
<script src="frontend/js/jquery.meanmenu.js"></script>
<script src="frontend/js/jquery.scrollUp.min.js"></script>
<script src="frontend/js/wow.js"></script>
<script src="frontend/js/plugins.js"></script>
<script src="frontend/js/main.js"></script>
<script src="frontend/custom-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="frontend/custom-slider/home.js" type="text/javascript"></script>
<script src="frontend/js/jquery.scrollUp.min.js"></script>
@endsection
<style type="text/css">
	.bxslider{
		display: flex;
		padding: 0px;
	}
	.bxslider img{
		height: 60px;
	}

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
