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
							<li class="category3"><span>Cá Nhân</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="user-profile">
		<div class="container">
			<div class="row">
				<div class="profile">
					<div class="col-md-3">
						<h4>Bảng điều khiển</h4>
						<table class="table table-bordered table-hover">
							<tbody>
							<tr>
								<td>
									<a href="{{ route('frontend.userProfile') }}"><i class="fa fa-user"></i> Thông tin tài khoản</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="{{ route('frontend.userBill') }}"><i class="fa fa-money"></i> Đơn hàng của bạn</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href=""><i class="fa fa-list-alt"></i> Sản phẩm yêu thích</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href=""><i class="fa fa-comment"></i> Quản lý bình luận</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="{{ route('frontend.logout') }}"><i class="fa fa-sign-out"></i> Thoát</a>
								</td>
							</tr>
						</tbody>
						</table>
					</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-sm-12">
								<h4>Danh sách hóa đơn</h4>
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th scope="col">Mã đơn hàng</th>
											<th scope="col">Ngày đặt hàng</th>
											<th scope="col">Tổng tiền</th>
											<th scope="col">Trạng thái</th>
											<th scope="col">Cập nhập cuối</th>
											<th scope="col">Chi tiết</th>
										</tr>
									</thead>
									<tbody>
										@foreach($bill as $key => $value)
										<tr>
											<td>{{ $value->id }}</td>
											<td>{{ $value->created_at }}</td>
											<td>{{ number_format($value->total)}} đ</td>
											<td>
												@if($value->status == 1)
												<span class="label label-primary">Đang xử lý</span>
												@elseif($value->status == 2)
												<span class="label label-info">Đang vận chuyển</span>
												@elseif($value->status == 3)
												<span class="label label-success">Giao hàng thành công</span>
												@elseif($value->status == 4)  
												<span class="label label-danger">Đã hủy</span>
												@endif
											</td>
											<td>{{ $value->updated_at}}</td>
											<td>
												<a href="{{ route('frontend.billDetail',$value->id)}}"><i class="fa fa-eye" aria-hidden="true"></i> Chi tiết</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
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
		.user-profile{
			margin-bottom: 200px;
		}
		.profile{
			padding: 10px;

		}

		.profile h4{
			margin-bottom: 10px;
		}

		.table a:hover{
			color: red;
		}

	</style>