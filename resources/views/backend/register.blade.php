<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="form-login">
			<form action="{{ route('register')}}" method="POST">
				@csrf
				<div class="form-group">
					<h3>ĐĂNG KÝ</h3>
				</div>
				<div class="form-group">
					<label for="username">Tài Khoản:</label>
					<input type="text" class="form-control" id="username" name="username">
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="pwd">Mật Khẩu:</label>
					<input type="password" class="form-control" id="pwd" name="password">
				</div>
				<div class="form-group">
					<label for="pwd">Nhập Lại Mật Khẩu:</label>
					<input type="password" class="form-control" id="pwd" name="rePassword">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Đăng Nhập</button>
					<a class="btn btn-primary">Quên Mật Khẩu</a>
				</div>
			</form>
		</div>
	</div> 
</body>
</html>


<style type="text/css">
	
	body{
		width: 100%;
		min-height: 650px;
		background:linear-gradient(-135deg,#c850c0,#4158d0);
	}
	.form-login{
		height: 30%;
		width: 500px;
		margin: 0 auto;
		padding-top: 100px;
		padding-left: 30px;
		padding-right: 30px;

	}

	form{
		border-radius: 20px;
		background: white;
		padding: 30px;
	}

	form h3{
		text-align: center;
	}
</style>