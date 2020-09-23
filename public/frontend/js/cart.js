function addCart(id,qty){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	});

	$.ajax({
		url: "http://localhost:8080/WebMusic/public/cap-nhap-gio-hang",
		method: 'get',
		data: {
			"id": id,
			"qty": qty,
		},
		success: function(result){
			if(result.status){
				window.location.reload();
			}else{
				alert(result.messages);
			}
		},
		error: function(result){
			alert("Đã có lỗi xảy ra!");
		}
	});
}


function subCart(id){ 
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	});

	$.ajax({
		url: "http://localhost:8080/WebMusic/public/cap-nhap-gio-hang",
		method: 'get',
		data: {
			"id": id,
			"qty": -1,
		},
		success: function(result){
			if(result == "ok"){
				window.location.reload();
			}
		},
		error: function(result){
			alert("error");
		}
	});
}


function deleteCart(id){
	var confirmation = confirm("Bạn có chắn chắn muốn xóa sản phẩm này khỏi giỏ hàng?");
	if(confirmation){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		});

		$.ajax({
			url: "http://localhost:8080/WebMusic/public/xoa-san-pham-trong-gio-hang",
			method: 'get',
			data: {
				"id": id,
			},
			success: function(result){
				if(result == "ok"){
					window.location.reload();
				}
			},
			error: function(result){
				alert("error");
			}
		});
	}

}