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
<link rel="stylesheet" type="text/css" href="frontend/css/cart.css">
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
							<a href="{{ route('frontend.home') }}">Trang Chủ</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>
						<li class="category3"><span>Giỏ Hàng</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<!-- Shopping Table Container -->
<div class="cart-area-start">
	<div class="container">
		<!-- Shopping Cart Table -->
		@if(isset($product_cart) && count($product_cart) > 0)
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="cart-table">
						<thead>
							<tr>
								<th>Hình Ảnh</th>
								<th>Tên Sản Phẩm</th>
								<th>Giá</th>
								<th>Số Lượng</th>
								<th>Tổng Tiền</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($product_cart as $key => $value)
							<tr>
								<td>
									<a href="#"><img src="../storage/app/public/product/{{ $value['item']->image['image']}}" alt="" width="100px;" height="100px;" /></a>
								</td>
								<td style="width: 200px;">
									<h6>{{ $value['item']->name }}</h6>
								</td>
								<td>
									<div class="cart-price">
										{{number_format( round(($value['item']->price * (100 - $value['item']->promotion) / 100),-3) )}} VNĐ
									</div>
								</td>
								<td>
									<span class="fsghbtn" onclick="addCart('{{$key}}',-1)">-</span>
									
									<input class="fs-ghplip" value="{{ $value['qty'] }}" readonly="" style="float: left;width: 37px; height: 28px; background-color: white; border: solid 1px #e0e0e0; border-right: none; border-left: none;">
									
									<span class="fsghbtn" onclick="addCart('{{$key}}',1)">+</span>
								</td>
								<td>
									<div class="cart-subtotal">{{ number_format($value['price']) }} VNĐ</div>
								</td>
								<td><a href="javascript:void(0)" onclick="deleteCart('{{ $key}}')"><i class="fa fa-times"></i></a></td>
							</tr>
							@endforeach
							<tr>
								<td class="actions-crt" colspan="7">
									<div class="">
										<div class="col-md-7 col-sm-4 col-xs-4"></div>
										<div class="col-md-3 col-sm-8 col-xs-8 align-right"><a class="cbtn" href="{{ route('frontend.home') }}" style="float: right;">Tiếp Tục Mua Hàng</a></div>
										<div class="col-md-2 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="{{ route('frontend.deleteCart') }}" onclick="return confirm('Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng?')" style="float: left;">Xóa Giỏ Hàng</a></div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		


		<!-- Shopping Cart Table -->
		<div class="shipping coupon cart-totals" style="float: right;">
			<ul>
				<li class="cartSubT">Số Lượng:    <span>{{ $totalQty }}</span></li>
				<li class="cartSubT">Tổng Thanh Toán:    <span>{{ number_format($totalPrice) }} đ</span></li>
			</ul>
			<a class="proceedbtn" href="{{ route('frontend.getCheckOut') }}">Thanh Toán</a>
		</div>
		@else
		<div class="row">
			<div class="col-sm-12">
				<div class="null_cart">
					<i class="iconnoti iconnull">
						<img src="../storage/app/public/logo/cart-empty.png" width="100px;" height="100px;">
					</i>
					<p style="text-align: center;">Không có sản phẩm nào trong giỏ hàng</p>
					<a href="{{ route('frontend.home') }}" class="buyother">Về trang chủ</a>
					<div class="callship">
						Khi cần trợ giúp vui lòng gọi <a href="tel:18001060">1800.1060</a> hoặc <a href="tel:02836221060">028.3622.1060</a> (7h30 - 22h)
					</div>
				</div>
			</div>
		</div>
		@endif
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
<script src="frontend/js/cart.js"></script>
@endsection

<style type="text/css">
	.bxslider{
		display: flex;
		padding: 0px;
	}
	.bxslider img{
		height: 60px;
	}

	.fs-ghplip{
		width: 50px;
	}

	.fsghbtn{
		float: left;
		cursor: pointer;
		width: 28px;
		height: 28px;
		line-height: 28px;
		text-align: center;
		color: #828282;
		font-size: 22px;
		background-color: #f8f8f8;
		border: solid 1px #dfdfdf;
	}
</style>
