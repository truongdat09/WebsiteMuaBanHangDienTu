@extends('layout')
@section('content')
@foreach($sanpham as $key => $sp)
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Product main img -->
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<div class="product-preview">
						<img src="{{URL::to('public/frontend/img/'.$sp->HINH)}}" alt="hình 1">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('public/frontend/img/'.$sp->HINH)}}" alt="hình 2">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('public/frontend/img/'.$sp->HINH)}}" alt="hình 3">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('public/frontend/img/'.$sp->HINH)}}" alt="hình 4">
					</div>
				</div>
			</div>
			<!-- /Product main img -->

			<!-- Product thumb imgs -->
			<div class="col-md-2  col-md-pull-5">
				<div id="product-imgs">
					<div class="product-preview">
						<img src="{{URL::to('public/frontend/img/'.$sp->HINH)}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('public/frontend/img/'.$sp->HINH)}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('public/frontend/img/'.$sp->HINH)}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('public/frontend/img/'.$sp->HINH)}}" alt="">
					</div>
				</div>
			</div>
			<!-- /Product thumb imgs -->

			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name">{{$sp->TENSP}}</h2>
					<div>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<a class="review-link" href="#">Đánh giá sản phẩm</a>
					</div>
					<div>
						<h3 class="product-price">{{number_format($sp->GIABAN, 0, '.', '.')}} VNĐ</h3>
						@if($sp->SOLUONG > 0)
						<span class="product-available">Còn hàng</span>
						@else
						<span class="product-available">Sản phẩm tạm thời hết.</span>
						@endif
					</div>
					<p style="text-align: justify;">{{$sp->MOTA}}</p>
					<div class="product-options">
						<label>
							<b>{{$sp->TENLOAI}}</b>
						</label>
						<label>
							Thương hiệu:
							<a href="#" style="font-weight: bold;" onclick="toggleForm('{{$sp->TEN_THUONGHIEU}}');">{{$sp->TEN_THUONGHIEU}}</a>
							<form id="myForm" action="" style="display: none;">
								<p style="text-align: justify;">{{$sp->MOTA_THUONGHIEU}}</p>
							</form>
						</label>
					</div>
					<form action="{{ URL::to('/gio-hang2') }}" method="POST" id="addToCartForm">
						{{ csrf_field() }}
						<div class="add-to-cart">
							@if($sp->SOLUONG > 0)
							<div class="qty-label">
								Số lượng:
								<div class="input-number">
									<input name="qty" type="number" value="1">
									<input name="MASP" type="hidden" value="{{ $sp->MASP }}">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</button>
							@else
							<a href="{{ URL::to('/san-pham') }}" class="add-to-cart-btn"> Tham khảo sản phẩm khác</a>
							@endif
						</div>
					</form>
					<ul class="product-btns">
						<li><a href="#"><i class="fa fa-heart-o"></i> yêu thích</a></li>
					</ul>
					<ul class="product-links">
						<li>Chia sẻ:</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-envelope"></i></a></li>
					</ul>

				</div>
			</div>
			<!-- /Product details -->

			<!-- Product tab -->
			<div class="col-md-12">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav">
						<!-- <li class="active"><a data-toggle="tab" href="#tab1">Mô tả chi tiết</a></li> -->
						<li><a data-toggle="tab" href="#tab3">Đánh giá (3)</a></li>
					</ul>
					<!-- /product tab nav -->

					<!-- product tab content -->
					<div class="tab-content">

						<!-- tab1  -->
						<!-- <div id="tab1" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-12">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
							</div>
						</div> -->
						<!-- /tab1  -->

						<!-- tab3  -->
						<div id="tab3" class="tab-pane fade in">
							<div class="row">
								<!-- Rating -->
								<div class="col-md-3">
									<div id="rating">
										<div class="rating-avg">
											<span>4.5</span>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<ul class="rating">
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-progress">
													<div style="width: 80%;"></div>
												</div>
												<span class="sum">3</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div style="width: 60%;"></div>
												</div>
												<span class="sum">2</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
										</ul>
									</div>
								</div>
								<!-- /Rating -->

								<!-- Reviews -->
								<div class="col-md-6">
									<div id="reviews">
										<ul class="reviews">
											<li>
												<div class="review-heading">
													<h5 class="name">John</h5>
													<p class="date">27 DEC 2018, 8:0 PM</p>
													<div class="review-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
												</div>
											</li>
											<li>
												<div class="review-heading">
													<h5 class="name">John</h5>
													<p class="date">27 DEC 2018, 8:0 PM</p>
													<div class="review-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
												</div>
											</li>
											<li>
												<div class="review-heading">
													<h5 class="name">John</h5>
													<p class="date">27 DEC 2018, 8:0 PM</p>
													<div class="review-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
												</div>
											</li>
										</ul>
										<ul class="reviews-pagination">
											<li class="active">1</li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
										</ul>
									</div>
								</div>
								<!-- /Reviews -->

								<!-- Review Form -->
								<div class="col-md-3">
									<div id="review-form">
										<form class="review-form">
											<input class="input" type="text" placeholder="Your Name">
											<input class="input" type="email" placeholder="Your Email">
											<textarea class="input" placeholder="Your Review"></textarea>
											<div class="input-rating">
												<span>Your Rating: </span>
												<div class="stars">
													<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
													<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
													<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
													<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
													<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
												</div>
											</div>
											<button class="primary-btn">Submit</button>
										</form>
									</div>
								</div>
								<!-- /Review Form -->
							</div>
						</div>
						<!-- /tab3  -->
					</div>
					<!-- /product tab content  -->
				</div>
			</div>
			<!-- /product tab -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@endforeach

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Sản phẩm gợi ý</h3>
				</div>
			</div>
			<!-- /section title -->
			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								@foreach($sanpham_tuongtu as $sanphamtt => $sptt)
								<!-- product -->
								<div class="product">
									<div class="product-img">
										<a href="{{ URL::to('/chi-tiet-san-pham/'.$sptt->MASP) }}" style="display: block; max-width: 100%; height: auto;">
											<img src="{{ URL::to('public/frontend/img/'.$sptt->HINH) }}" alt="" style="width: 100%; height: auto;">
										</a>
										<div class="product-label">
											<span class="new">MỚI</span>
										</div>
									</div>
									<form action="{{URL::to('/gio-hang')}}" method="POST">
										{{csrf_field()}}
										<div class="product-body">
											<input name="MASP" type="hidden" value="{{$sptt->MASP}}">
											<input name="qty" type="hidden" value="1">
											<p class="product-category">{{$sptt->TEN_THUONGHIEU}}</p>
											<h3 class="product-name"><a href="{{URL::to('/chi-tiet-san-pham/'.$sptt->MASP)}}">{{$sptt->TENSP}}</a></h3>
											<h4 class="product-price">{{number_format($sptt->GIABAN)}} VNĐ</h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<a href="#" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp"> Yêu thích</span></a>
												<button class="add-to-compare"><i class="fa fa-shopping-cart"></i><span class="tooltipp">thêm giỏ hàng</span></button>
											</div>
										</div>
										<!-- <div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm giỏ hàng</button>
											</div> -->
									</form>
								</div>
								<!-- /product -->
								@endforeach
							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<br>
<hr>
<script>
	function toggleForm(thuongHieu) {
		var form = document.getElementById('myForm');
		// Nếu form đang ẩn (display = 'none'), thì hiển thị, ngược lại, ẩn đi
		form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';

		// Có thể thêm mã để xử lý thông tin thương hiệu (thuongHieu) tại đây.
	}

	document.getElementById('addToCartForm').addEventListener('submit', function(event) {
		// Ngăn chặn sự kiện mặc định của form
		event.preventDefault();

		// Thực hiện AJAX request để gửi dữ liệu form và kiểm tra kết quả
		$.ajax({
			url: "{{ URL::to('/gio-hang2') }}",
			type: 'POST',
			data: $('#addToCartForm').serialize(),
			success: function(response) {
				// Hiển thị SweetAlert2 thông báo thành công
				Swal.fire({
					icon: 'success',
					title: 'Thành công!',
					text: 'Sản phẩm đã được thêm vào giỏ hàng thành công!',
				}).then(function() {
					// Sau khi người dùng đóng thông báo, load lại trang
					location.reload();
				});
			},
			error: function(error) {
				// Xử lý lỗi nếu có
				console.error('Đã xảy ra lỗi: ', error);
			}
		});
	});
</script>
@endsection