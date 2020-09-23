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
<link rel="stylesheet" href="frontend/css/user-profile.css">
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
							<h4>Thông tin tài khoản</h4>
							@if(Session::has("success"))
							<div class="form-group">
								<p class="alert alert-success">{{ Session::get('success') }}</p>
							</div>
							@endif
							<table class="table table-bordered table-striped">
								<tbody>
									<tr>
										<td>Tài khoản</td>
										<td colspan="4">{{ $user->username }}</td>
									</tr>
									<tr>
										<td>Email</td>
										<td colspan="4">{{ $user->email }}</td>
									</tr>
									<tr>
										<td>Họ tên</td>
										<td colspan="2">{{ $user->fullname }}</td>
										<td>Số điện thoại</td>
										<td>{{ $user->phone }}</td>
									</tr>
									<tr>
										<td>Địa chỉ</td>
										<td colspan="4">{{ $user->address }}</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-7">
							<h4>Cập nhập thông tin cá nhân</h4>
							<form action="{{ route('frontend.userProfile') }}" method="post">
								@csrf
								<table class="table table-bordered table-striped">
									<tbody>
										<tr>
											<td>Họ tên</td>
											<td>
												<input type="text" name="fullname" class="form-control" value="{{ $user->fullname }}">
											</td>
										</tr>
										<tr>
											<td>Số điện thoại</td>
											<td>
												<input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
											</td>
										</tr>
										<tr>
											<td>Địa chỉ</td>
											<td>
												<input type="text" name="address" class="form-control" value="{{ $user->address }}">
											</td>
										</tr>
										<tr>
											<td colspan="2" style="text-align: center;">
												<input type="submit" name="btnSubmit" class="btn btn-default btn-primary" value="Cập Nhật Thông Tin">
											</td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>

						<div class="col-sm-5">
							<h4>Đổi mật khẩu</h4>
							<form action="{{ route('frontend.userPassword') }}" method="post">
								@csrf
								<table class="table table-bordered table-striped">
									<tbody>
										<tr>
											<td>Mật khẩu hiện tại</td>
											<td>
												<input type="password" name="password" class="form-control">
												@if($errors->has('password'))
												<p class="text-danger">{{ $errors->first('password') }}</p>
												@endif 
											</td>
										</tr>
										<tr>
											<td>Mật khẩu mới</td>
											<td>
												<input type="password" name="newPassword" class="form-control">
												@if($errors->has('newPassword'))
												<p class="text-danger">{{ $errors->first('newPassword') }}</p>
												@endif 
											</td>
										</tr>
										<tr>
											<td width="100px;">Nhập lại mật khẩu mới</td>
											<td>
												<input type="password" name="confirmNewPassword" class="form-control">
												@if($errors->has('confirmNewPassword'))
												<p class="text-danger">{{ $errors->first('confirmNewPassword') }}</p>
												@endif 
											</td>
										</tr>
										<tr>
											<td colspan="2" style="text-align: center;">
												<input type="submit" name="btnSubmit" class="btn btn-default btn-primary" value="Đổi Mật Khẩu">
											</td>
										</tr>
									</tbody>
								</table>
							</form>
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
	.table a:hover{
			color: red;
		}
</style>