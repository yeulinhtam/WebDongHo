<!DOCTYPE html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Shop Đồng Hồ</title>
	<base href="{{ asset('') }}">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('js-bootstrap-header') 
</head>
<body class="home-two">
	<!-- header area start -->
	<header class="header-two short-stor">
		<div class="container-fluid">
			<div class="row">
				<!-- logo start -->
				<div class="col-md-12 text-center">
					<div class="top-logo">
						<a href="index.html"><img src="frontend/img/logo-top.gif" alt="" /></a>
					</div>
				</div>
				<!-- logo end -->
			</div>
		</div>
		<div class="container">
			<div class="row" style=" background-color:gold; margin: 2px;">
				<!-- mainmenu area start -->
				<div class="col-md-9 text-center">
					<div class="mainmenu">
						<nav>
							<ul>
								<li class="expand"><a href="{{ route('frontend.home') }}">Trang Chủ</a></li>
								<li class="expand"><a href="#">Sản Phẩm</a>
									<ul class="restrain sub-menu">
										@foreach($category as $key => $value)
										<li><a href="{{route('frontend.category',$value->slug) }}">{{ $value->categoryName }}</a>
											@endforeach
										</ul>									
									</li>
									<li class="expand"><a href="{{ route('frontend.news')}}">Tin Tức</a></li>
									<li class="expand"><a href="">Khuyến Mãi</a></li>
									<li class="expand"><a href="">Chính Sách</a></li>
									<li class="expand"><a href="">Liên Hệ</li>
									</ul>
								</nav>
							</div>
							<!-- mobile menu start -->
							<div class="row">
								<div class="col-sm-12 mobile-menu-area">
									<div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
										<span class="mobile-menu-title">Menu</span>
										<nav>
											<ul>
												<li><a href="index.html">Home</a>
													<ul>
														<li><a href="index-2.html">Home 2</a></li>
														<li><a href="index-3.html">Home 3</a></li>
														<li><a href="index-4.html">Home 4</a></li>
														<li><a href="index-5.html">Home 5</a></li>
														<li><a href="index-6.html">Home 6</a></li>
														<li><a href="index-7.html">Home 7</a></li>
														<li><a href="index-8.html">Home 8</a></li>
													</ul>
												</li>
												<li><a href="shop-grid.html">Man</a>
													<ul>
														<li><a href="shop-grid.html">Dresses</a>
															<ul>
																<li><a href="shop-grid.html">Coctail</a></li>
																<li><a href="shop-grid.html">Day</a></li>
																<li><a href="shop-grid.html">Evening </a></li>
																<li><a href="shop-grid.html">Sports</a></li>
															</ul>
														</li>
														<li><a class="mega-menu-title" href="shop-grid.html"> Handbags </a>
															<ul>
																<li><a href="shop-grid.html">Blazers</a></li>
																<li><a href="shop-grid.html">Table</a></li>
																<li><a href="shop-grid.html">Coats</a></li>
																<li><a href="shop-grid.html">Kids</a></li>
															</ul>
														</li>
														<li><a class="mega-menu-title" href="shop-grid.html"> Clothing </a>
															<ul>
																<li><a href="shop-grid.html">T-Shirt</a></li>
																<li><a href="shop-grid.html">Coats</a></li>
																<li><a href="shop-grid.html">Jackets</a></li>
																<li><a href="shop-grid.html">Jeans</a></li>
															</ul>
														</li>
													</ul>
												</li>
												<li><a href="shop-list.html">Women</a>
													<ul>
														<li><a href="shop-grid.html">Rings</a>
															<ul>
																<li><a href="shop-grid.html">Coats & Jackets</a></li>
																<li><a href="shop-grid.html">Blazers</a></li>
																<li><a href="shop-grid.html">Jackets</a></li>
																<li><a href="shop-grid.html">Rincoats</a></li>
															</ul>
														</li>
														<li><a href="shop-grid.html">Dresses</a>
															<ul>
																<li><a href="shop-grid.html">Ankle Boots</a></li>
																<li><a href="shop-grid.html">Footwear</a></li>
																<li><a href="shop-grid.html">Clog Sandals</a></li>
																<li><a href="shop-grid.html">Combat Boots</a></li>
															</ul>
														</li>
														<li><a href="shop-grid.html">Accessories</a>
															<ul>
																<li><a href="shop-grid.html">Bootees bags</a></li>
																<li><a href="shop-grid.html">Blazers</a></li>
																<li><a href="shop-grid.html">Jackets</a></li>
																<li><a href="shop-grid.html">Jackets</a></li>
															</ul>
														</li>
														<li><a href="shop-grid.html">Top</a>
															<ul>
																<li><a href="shop-grid.html">Briefs</a></li>
																<li><a href="shop-grid.html">Camis</a></li>
																<li><a href="shop-grid.html">Nigntwears</a></li>
																<li><a href="shop-grid.html">Shapewears</a></li>
															</ul>
														</li>
													</ul>
												</li>
												<li><a href="shop-grid.html">Shop</a>
													<ul>
														<li><a href="shop-list.html">Shop Pages</a>
															<ul>
																<li><a href="shop-list.html">List View </a></li>
																<li><a href="shop-grid.html">Grid View</a></li>
																<li><a href="login.html">My Account</a></li>
																<li><a href="wishlist.html">Wishlist</a></li>
																<li><a href="cart.html">Cart </a></li>
																<li><a href="checkout.html">Checkout </a></li>
															</ul>
														</li>
														<li><a href="product-details.html">Product Types</a>
															<ul>
																<li><a href="product-details.html">Simple Product</a></li>
																<li><a href="product-details.html">Variables Product</a></li>
																<li><a href="product-details.html">Grouped Product</a></li>
																<li><a href="product-details.html">Downloadable</a></li>
																<li><a href="product-details.html">Virtual Product</a></li>
																<li><a href="product-details.html">External Product</a></li>
															</ul>
														</li>
													</ul>
												</li>
												<li><a href="#">Pages</a>
													<ul>
														<li><a href="shop-grid.html">Shop Grid</a></li>
														<li><a href="shop-list.html">Shop List</a></li>
														<li><a href="product-details.html">Product Details</a></li>
														<li><a href="contact-us.html">Contact Us</a></li>
														<li><a href="about-us.html">About Us</a></li>
														<li><a href="cart.html">Shopping cart</a></li>
														<li><a href="checkout.html">Checkout</a></li>
														<li><a href="wishlist.html">Wishlist</a></li>
														<li><a href="login.html">Login</a></li>
														<li><a href="404.html">404 Error</a></li>
													</ul>													
												</li>
												<li><a href="about-us.html">About Us</a></li>
												<li><a href="contact-us.html">Contact Us</a></li>
											</ul>
										</nav>
									</div>						
								</div>
							</div>
							<!-- mobile menu end -->
						</div>
						<!-- mainmenu area end -->
						<!-- top details area start -->
						<div class="col-md-3 text-right">
							<div class="top-detail">
								<!-- addcart top start -->
								<div class="disflow crt-edt">
									<div class="circle-shopping expand">
										<div class="shopping-carts text-right">
											<div class="cart-toggler">
												<a href="{{ route('frontend.cart') }}"><i class="icon-bag"></i></a>
												<a href="{{ route('frontend.cart') }}">
													<span class="cart-quantity">
														@if(Session::has('cart'))
												        {{ $totalQty }}
												        @else
												        <p>Trống</p>
												        @endif
												    </span>
												</a>
											</div>
											<div class="restrain small-cart-content">
												<ul class="cart-list">
													@if(Session::has('cart'))
													@foreach($product_cart as $key => $value)
													<li>
														<a class="sm-cart-product" href="product-details.html">
															<img src="../storage/app/public/product/{{ $value['item']->image['image']}}" alt="">
														</a>
														<div class="small-cart-detail">
															<a class="remove" href="{{ route('frontend.cart.delete',$value['item']->id)}}"><i class="fa fa-times-circle"></i></a>
															<a class="small-cart-name" href="product-details.html">{{ $value['item']->name}}</a>
															<span class="quantitys"><strong>{{ $value['qty'] }}</strong>x<span>{{number_format( round(($value['item']->price * (100 - $value['item']->promotion) / 100),-3) )}} đ</span></span>
														</div>
													</li>
													@endforeach
													@else
													
													@endif
												</ul>
												<p class="total">Tổng cộng: 
													<span class="amount">
													@if(Session::has('cart'))	
													{{ number_format($totalPrice) }} đ
													@else
													<p></p>
													@endif
												    </span>
												</p>
												<p class="buttons">
													<a href="{{ route('frontend.getCheckOut') }}" class="button">Thanh Toán</a>
												</p>
											</div>
										</div>
									</div>
								</div>
								<!-- addcart top start -->
								<!-- search divition start -->
								<div class="disflow dflt-src">
									<div class="header-search expand">
										<div class="search-icon fa fa-search"></div>
										<div class="product-search restrain">
											<div class="container nopadding-right">
												<form action="{{ route('frontend.getSearch') }}" id="searchform" method="get">
													<div class="input-group">
														<input type="text" class="form-control" maxlength="128" name="key" placeholder="Tìm kiếm...">
														<span class="input-group-btn">
															<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
														</span>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- search divition end -->
								<div class="disflow">
									<div class="expand dropps-menu">
										<a href="#"><i class="fa fa-align-right"></i></a>
										<ul class="restrain language">
											@if(Auth::check())
											<li><a href="{{ route('frontend.userProfile') }}">Xin chào: {{ Auth::user()->username }}</a></li>
											<li><a href="{{ route('frontend.logout')}}">Đăng xuất</a></li>
											@else
											<li><a href="{{ route('frontend.login') }}">Đăng nhập</a></li>
											<li><a href="{{ route('frontend.signup') }}">Đăng ký tài khoản</a></li>
											@endif
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- top details area end -->
					</div>
				</div>
			</header>
			<!-- header area end -->
			@yield('slider')
			@yield('brand')
			@yield('content')
			@yield('news')
			@include('frontend.footer')
			@yield('js-bootstrap-footer')
		</body>
		</html>