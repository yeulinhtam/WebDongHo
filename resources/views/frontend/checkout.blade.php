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
							<a href="index.html">Trang Chủ</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>
						<li class="category3"><span>Thanh Toán</span></li>
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
		<div class="row">
			<div class="col-md-8">
				<h3 style="margin: 10px;">THÔNG TIN THANH TOÁN</h3>
				@if(Auth::check())
				<form action="{{ route('frontend.postCheckOut') }}" method="post">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputName">Họ Tên</label>
							<input type="text" class="form-control"  name="name" id="inputName" placeholder="Nhập họ tên đầy đủ" value="{{ Auth::user()->fullname }}">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPhone">Số Điện Thoại</label>
							<input type="text" class="form-control" name="phone" id="inputPhone" placeholder="Nhập số điện thoại" value="{{ Auth::user()->phone }}">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="inputAddress">Địa Chỉ Email</label>
							<input type="text" class="form-control" name="email" id="inputAddress" placeholder="Nhập địa chỉ email" value="{{ Auth::user()->email }}">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="inputAddress">Địa Chỉ Giao Hàng</label>
							<input type="text" class="form-control" name="address" id="inputAddress" placeholder="Nhập địa chỉ giao hàng"
							value="{{ Auth::user()->address }}">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="inputAddress">Ghi Chú</label>
							<textarea class="form-control" cols="3" rows="5" name="note"></textarea>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-danger">Hoàn Tất</button>
						</div>
					</div>
				</form>
				@else
				<form action="{{ route('frontend.postCheckOut') }}" method="post">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputName">Họ Tên</label>
							<input type="text" class="form-control"  name="name" id="inputName" placeholder="Nhập họ tên đầy đủ">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPhone">Số Điện Thoại</label>
							<input type="text" class="form-control" name="phone" id="inputPhone" placeholder="Nhập số điện thoại">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="inputAddress">Địa Chỉ Email</label>
							<input type="text" class="form-control" name="email" id="inputAddress" placeholder="Nhập địa chỉ email">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="inputAddress">Địa Chỉ Giao Hàng</label>
							<input type="text" class="form-control" name="address" id="inputAddress" placeholder="Nhập địa chỉ giao hàng">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="inputAddress">Ghi Chú</label>
							<textarea class="form-control" cols="3" rows="5" name="note"></textarea>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-danger">Hoàn Tất</button>
						</div>
					</div>
				</form>
				@endif
			</div>
			<div class="col-md-4">
				<h3 style="margin: 10px;">GIỎ HÀNG</h3>
				@foreach($product_cart as $key => $value)
				<div class="form-row checkOutProduct" style="padding: 10px;">
					<div class="checkOutImg">
						<img src="../storage/app/public/product/{{ $value['item']->image['image']}}" width="60px" height="60px">
					</div>
					<div class="checkOutContent">
						<div class="checkOutProductName">
							<a>{{ $value['item']->name }}</a>
						</div>
						<div class="checkOutProductPrice">
							<span>{{number_format( round(($value['item']->price * (100 - $value['item']->promotion) / 100),-3) )}} x {{ $value['qty'] }} = {{ number_format($value['price']) }} đ</span>
						</div>
					</div>
				</div>
				@endforeach
				<div class="form-row checkOutTotal">
					<div class="checkOutTotalLabel">
						<div>Số lượng: </div>
						<div>Thành tiền: </div>
					</div>
					<div class="checkOutTotalDetail">
						<div class="total" style="text-align:right;">{{ $totalQty }}</div>
						<div class="totalPrice">{{ number_format($totalPrice) }} đ</div>
					</div>
				</div>
			</div>
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

	.checkOutImg{
		padding: 10px;
		float: left;
		border: 1px solid #f1f0f1;
	}

	.checkOutContent{
		margin-left: 10px;
	}

	.checkOutProduct{
		border: 1px solid #f1f0f1;
		height: 100px; 
	}

	.checkOutProductName{
		font-size: 14px;
		margin-bottom: 15px;
		display: block;
		height: 36px;
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
	}

	.checkOutProductName a{
		color: blue;
	}

	.checkOutProductPrice{
		color: black;
	}

	.checkOutProductName a:hover{
		color: red;
	}

	.checkOutContent{
		padding-left: 10px;	
		display: -webkit-box;
		-webkit-line-clamp: 3;
		-webkit-box-orient: vertical;
		overflow: hidden;
	}

	.checkOutTotal{
		padding-top:10px;
		margin-top: 20px;
		border-top: 1px solid #f1f0f1;
	}
	.checkOutTotalDetail{
		float: right;
		color: black;
	}

	.checkOutTotalLabel{
		float: left;
		color: black;
	}
</style>
