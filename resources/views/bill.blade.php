<!DOCTYPE html>
<html>
<head>
	<title>Vũ Minh Watch</title>
	<style type="text/css">

		body{
			width: 50%;
			margin: 0px auto;
			border: 1px solid #c3c3c3;

		}
		.header{
			padding-top: 20px;
			width: 100%;
		}
		#notification{
			color: white;
			background-color: red;
			padding:5px 20px;
			font-size: 26px;
			margin: 0 auto;
		}

		.logo{
			text-align: center;
		}

		.content{
			width: 100%;
		}
		#notification-content{
			padding:25px 20px 0px 20px;
			font-size: 20px;
			margin: 0 auto;
		}

		#bill-content{
			color: black;
			font-size: 18px;
			padding:5px 20px;
		}

		#bill-content #order{
			color: red;
			font-size: 22px;
		}

		.bill-table{
			width: 100%;
			margin-bottom: 100px;
		}

		#customers {
			margin-left: 20px;
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 95%;
		}

		#customers td, #customers th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #f2f2f2;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			color: black;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="logo">
			<img src="https://cdn3.dhht.vn/wp-content/uploads/2014/05/logo-hai-trieu3.png" width="170px;" height="60px">
		</div>
		<p id="notification">Đơn hàng của bạn {{ $messages }}</p>
	</div>
	<div class="content">
		<p id="notification-content">Xin chào {{ $bill->name }}, đơn đặt hàng của bạn {{ $messages }}. Chi tiết đặt hàng của bạn được hiển thị dưới đây để bạn tham khảo:</p>
		<p id="bill-content"><span id="order">Mã đơn hàng:</span> #{{ $bill->id }} ({{ Carbon\Carbon::now()->toDateTimeString() }})</p>
	</div>
	<div class="bill-table">
		<table id="customers">
			<tr>
				<th>Tên Sản Phẩm</th>
				<th>Số Lượng</th>
				<th>Thành Tiền</th>
			</tr>
			@foreach($product as $key => $value)
			<tr>
				<td>{{ $value->name }}</td>
				<td>{{ $value->quantity }}</td>
				<td>{{ number_format($value->price) }} đ</td>
			</tr>
			@endforeach
			<tr>
				<th colspan="2">Số lượng:</th>
				<td>{{ $bill->quantity }}</td>
			</tr>
			<tr>
				<th colspan="2">Tổng Cộng:</th>
				<td>{{ number_format($bill->total) }} đ</td>
			</tr>

		</table>
	</div>
</body>
</html>


