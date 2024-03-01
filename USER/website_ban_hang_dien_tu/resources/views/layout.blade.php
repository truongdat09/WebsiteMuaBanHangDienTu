<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro.</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/slick-theme.css')}}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/nouislider.min.css')}}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" />

	<!-- HTML5 shim and Respond.js')}} for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js')}} doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +84-70-240-5352</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
					<li><a href="#"><i class="fa fa-map-marker"></i> 140 Lê Trọng Tấn, Tân Phú, TPHCM</a></li>
				</ul>
				<ul class="header-links pull-right">

					<?php

					use Illuminate\Console\View\Components\Alert;

					$makh = session('SDT');
					$name = session('user_name');
					if ($name) {
						echo '<li><a href="' . URL::to('/thong-tin-tai-khoan/' . $makh . '') . '">' . '<i class="fa fa-user-circle-o"></i>' . '<span style="text-transform: uppercase;">' . $name . '</span></a></li>';
						//session(['user_name' => null]);
						echo '<li><a href="' . URL::to('/user-logout') . '">&nbsp;&nbsp; Đăng xuất  <i class="fa fa-sign-out"></i></a></li>';
					} else {
						echo '<li><a href="' . URL::to('/dang-nhap') . '"><i class="fa fa-user-o"></i> Tài khoản</a></li>';
					}
					?>

				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#" class="logo">
								<img src="{{asset('public/frontend/img/logo.png')}}" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form action="{{URL::to('/tim-kiem-san-pham')}}" method="post">
								@csrf
								
								<input class="input" name="keywords" placeholder="Bạn đang tìm gì...">
								<button type="submit" class="search-btn">Tìm kiếm</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-heart-o"></i>
									<span>Yêu thích</span>
									<div class="qty">0</div>
								</a>
								<!-- <div class="cart-dropdown">
									<div class="cart-list">
										<div class="product-widget">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price"><span class="qty"></span>$980.00</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>

										<div class="product-widget">
											<div class="product-img">
												<img src="./img/product02.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price"><span class="qty"></span>$980.00</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>
									</div>
									<div class="cart-summary">
										<small>3 sản phẩm yêu thích</small>
									</div>
									<div class="cart-btns">
										<a href="#">Chi tiết</a>
										<a href="#">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div> -->
							</div>
							<!-- /Wishlist -->
							@php
							$content = Cart::content();
							@endphp
							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									@if(Cart::count() > 0)
									<span> Giỏ hàng</span>
									<div class="qty">{{Cart::count()}}</div>
									@else
									<span> Giỏ hàng</span>
									<div class="qty">{{Cart::count()}}</div>
									@endif
								</a>
								<div class="cart-dropdown">
									<div class="cart-list">
										@foreach($content as $key => $value_content)
										<div class="product-widget">
											<div class="product-img">
												<img src="{{ URL::to('public/frontend/img/'.$value_content->options->image) }}" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="{{ URL::to('/chi-tiet-san-pham/'.$value_content->id) }}">{{ $value_content->name }}</a></h3>
												<h4 class="product-price"><span class="qty">{{ $value_content->qty }}x</span>{{ number_format(($value_content->price * $value_content->qty), 0, '.', '.') }} ₫</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>
										@endforeach
									</div>
									<div class="cart-summary">
										<small>{{Cart::content()->count()}} sản phẩm đã chọn</small>
										<h5>Tổng tiền: {{ Cart::total(0,',','.') }} ₫</h5>
									</div>
									<div class="cart-btns">
										<a href="{{URL::to('/show-gio-hang')}}">Giỏ Hàng</a>
										<?php
										$MAKH = session('SDT');
										if ($MAKH != null) {
										?>
											<a href="{{URL::to('/thanh-toan')}}">Đặt Hàng <i class="fa fa-arrow-circle-right"></i></a>
										<?php
										} else {
										?>
											<?php
											Session::put('dangnhap_thanhtoan', 'Vui lòng đăng nhập tài khoản để thực hiện thanh toán');
											?>
											<a href="{{URL::to('/dang-nhap')}}">Đặt Hàng <i class="fa fa-arrow-circle-right"></i></a>
										<?php
										}
										?>
									</div>
								</div>
							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li><a href="{{URL::to('/trang-chu')}}">Trang Chủ</a></li>
					<li><a href="{{URL::to('/san-pham')}}">Sản Phẩm</a></li>
					<li><a href="{{URL::to('/show-gio-hang')}}">Giỏ Hàng</a></li>
					<?php
					$makh = session('SDT');
					if ($makh) {
						echo '<li><a href="' . URL::to('/theo-doi-don-hang/' . $makh . '') . '"> Theo Dõi Đơn Hàng</a></li>';
					} else {
						echo '<li><a href="' . URL::to('/dang-nhap') . '"> Theo Dõi Đơn Hàng</a></li>';
					}
					?>

					<li><a href="{{URL::to('/gioi-thieu-chung-toi')}}">Giới Thiệu Chúng Tôi</a></li>
				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->

	@yield('content')

	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<p>Đăng ký nhận <strong> THÔNG TIN MỚI</strong></p>
						<form>
							<input class="input" type="email" placeholder="Nhập Email">
							<button class="newsletter-btn"><i class="fa fa-envelope"></i> Đăng Ký</button>
						</form>
						<ul class="newsletter-follow">
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

	<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Về chúng tôi</h3>
							<p>Là công ty kinh doanh và hoạt động mạnh mẽ trong lĩnh vực mua bán hàng điện tử.</p>
							<ul class="footer-links">
								<li><a href="#"><i class="fa fa-map-marker"></i>140 Lê Trọng Tấn, Tân Phú, TPHCM</a></li>
								<li><a href="#"><i class="fa fa-phone"></i>+84-70-240-5352</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">tên loại sản phẩm</h3>
							<ul class="footer-links">
								<li><a href="#">Giảm giá cực sâu</a></li>
								<li><a href="#">Laptops</a></li>
								<li><a href="#">Điện thoại</a></li>
								<li><a href="#">Máy ảnh</a></li>
								<li><a href="#">tai nghe</a></li>
							</ul>
						</div>
					</div>

					<div class="clearfix visible-xs"></div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Thông tin</h3>
							<ul class="footer-links">
								<li><a href="#">Thông tin về chúng tôi</a></li>
								<li><a href="#">Liên hệ</a></li>
								<li><a href="#">Chính sách bảo hành</a></li>
								<li><a href="#">Chính sách đổi trả</a></a></li>
								<li><a href="#">Giao hàng & Thanh toán</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Dịch vụ</h3>
							<ul class="footer-links">
								<li><a href="#">Tài khoản</a></li>
								<li><a href="#">Giỏ hàng</a></li>
								<li><a href="#">Sản phẩm yêu thích</a></li>
								<li><a href="#">Hotline : 1900.80.80.80</a></li>
								<li><a href="#">Hỏi đáp</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->

		<!-- bottom footer -->
		<div id="bottom-footer" class="section">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="footer-payments">
							<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
							<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
						</ul>
						<span class="copyright">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							KhaDatTien &copy;<script>
								document.write(new Date().getFullYear());
							</script>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</span>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bottom footer -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/nouislider.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.zoom.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/main.js')}}"></script>
	<script type="text/javascript">

		$(document).ready(function(){

			$('#sort').on('change',function(){
				var url = $(this).val();
				if(url){
					window.location = url;
				}
				return false;
			});
		});
	</script>

</body>

</html>