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
						<li class="category3"><span>Đơn hàng</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bill-info">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="toggle-info-bill">
					<button class="btn btn-info" id="toggle-button" onclick="toggleBill()">Chi tiết đơn hàng</button>
				</div>
				<div class="bill-content" id="bill-content" style="display: none;">
					<div class="bill-content-row">
						<p>Người đặt: <span>{{ $bill->name }}</span></p>
					</div>
					<div class="bill-content-row">
						<p>Email: <span>{{ $bill->email }}</span>
						</div>
						<div class="bill-content-row">
							<p>Số điện thoại: <span>{{ $bill->phone }}</span></p>
						</div>
						<div class="bill-content-row">
							<p>Địa chỉ: <span>{{ $bill->address }}</span></p>
						</div>
						<div class="bill-content-row">
							<p>Ghi chứ: <span>{{ $bill->note }}</span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th scope="col">STT</th>
								<th scope="col">Sản phẩm</th>
								<th scope="col">Hình ảnh</th>
								<th scope="col">Giá</th>
								<th scope="col">Số lượng</th>
								<th scope="col">Thành tiền</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key => $value)
							<tr>
								<th scope="row">{{ $key + 1  }}</th>
								<td>{{ $value->name }}</td>
								<td>
									<img src="../storage/app/public/product/{{ $value->image}}" width="60px" height="60px">
								</td>
								<td>{{ number_format($value->price / $value->quantity) }} đ</td>
								<td>{{ $value->quantity }}</td>
								<td>{{ number_format($value->price) }} đ</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<p style="float: right; color: black; font-size: 18px;">Tổng cộng: {{ number_format($bill->total) }} đ</p>
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
		.bill-info{
			margin-bottom: 200px;
		}

		table th{
			font-size: 14px;
			color: black;
			font-style: normal;
		}

		.bill-content{
			width: 60%;
			float: left;
		}

		.bill-content-row{
			float: left;
			width: 50%;
		}

		.bill-content p{
			color: black;
		}

		.toggle-info-bill{
			padding-bottom: 10px;
		}
	</style>

	<script type="text/javascript">
		function toggleBill(){
			var x = document.getElementById("bill-content");
			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}

		}

	</script>