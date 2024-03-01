@extends('layout')
@section('content')
<style>
	.aside-content {
		display: none;
	}
</style>


<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->
			<div id="aside" class="col-md-3">
				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Danh Mục Sản Phẩm</h3>
					<div class="checkbox-filter">
						@foreach($loaisanpham as $key => $lsp)
						<div class="input-checkbox">
							<label for="category-1">
								<a href="{{URL::to('/san-pham-theo-loai/'.$lsp->MALOAI)}}">{{$lsp->TENLOAI}}</a>
								<small>({{$lsp->SoLuongSanPham}})</small>
							</label>
						</div>
						@endforeach
					</div>
				</div>
				<!-- /aside Widget -->
				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Giá</h3>
					<div class="price-filter">
						<div id="price-slider"></div>
						<div class="input-number price-min">
							<input id="price-min" type="number">
							<span class="qty-up">+</span>
							<span class="qty-down">-</span>
						</div>
						<span>-</span>
						<div class="input-number price-max">
							<input id="price-max" type="number">
							<span class="qty-up">+</span>
							<span class="qty-down">-</span>
						</div>
					</div>
				</div>

				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Thương Hiệu Sản Phẩm</h3>
					<div class="checkbox-filter">
						@foreach($thuonghieu as $key => $th)
						<div class="input-checkbox">
							<label for="brand-1">
								<span></span>
								<a href="{{URL::to('/san-pham-theo-thuong-hieu/'.$th->MATUONGHIEU)}}">{{$th->TEN_THUONGHIEU}}</a>
								<small>({{$th->SoLuongSanPham}})</small>
							</label>
						</div>
						@endforeach
						<div class="input-checkbox">
							<label for="brand-1">
								<span></span>
								<a href="#">Xem thêm</a>
							</label>
						</div>
					</div>
				</div>
			</div>
			<!-- /ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sắp xếp theo :							
								<select name="sort" id="sort" class="input-select">
									<option value="{{Request::url()}}?sort_by=none">Mặc định</option>
									<option value="{{Request::url()}}?sort_by=tang_dan">Giá bán tăng dần</option>
									<option value="{{Request::url()}}?sort_by=giam_dan">Giá bán giảm dần</option>
									<option value="{{Request::url()}}?sort_by=kytu_az">Tên sản phẩm A-Z</option>
									<option value="{{Request::url()}}?sort_by=kytu_za">Tên sản phẩm Z-A</option>
								</select>
							<select class="input-select">
								<option value="0">Tất cả</option>
								<option value="1">Còn hàng</option>
							</select>

							<select class="input-select">
								<option value="0">10 sản phẩm</option>
								<option value="1">15 sản phẩm</option>
								<option value="2">20 sản phẩm</option>
								<option value="3">30 sản phẩm</option>
							</select>
						</label>
						<label>{{$tatca_sanpham->total()}} sản phẩm</label>
					</div>
					<ul class="store-grid">
						<li class="active"><i class="fa fa-th"></i></li>
						<li><a href="#"><i class="fa fa-th-list"></i></a></li>
					</ul>
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">
					<!-- product -->
					@foreach($tatca_sanpham as $key => $allsp)
					<div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<a href="{{ URL::to('/chi-tiet-san-pham/'.$allsp->MASP) }}" style="display: block; max-width: 100%; height: auto;">
									<img src="{{ URL::to('public/frontend/img/'.$allsp->HINH) }}" alt="" style="width: 100%; height: auto;">
								</a>

								<div class="product-label">
									<!-- <span class="sale"> Giảm 30%</span> -->
									<span class="new">MỚI</span>
								</div>
							</div>
							<form action="{{URL::to('/gio-hang2')}}" method="POST">
								{{csrf_field()}}
								<div class="product-body">
									<input name="MASP" type="hidden" value="{{$allsp->MASP}}">
									<input name="qty" type="hidden" value="1">
									<p class="product-category">Thương hiệu: {{ $allsp->TEN_THUONGHIEU }}</p>
									<h3 class="product-name"><a id="wishlist_name{{$allsp->MASP}}" href="{{URL::to('/chi-tiet-san-pham/'.$allsp->MASP)}}">{{$allsp->TENSP}}</a></h3>
									<h4 id="wishlist_price{{$allsp->MASP}}" class="product-price">{{number_format($allsp->GIABAN, 0, '.', '.') }} VNĐ</h4>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-btns">
										<button class="add-to-compare"><i class="fa fa-shopping-cart"></i><span class="tooltipp">thêm giỏ hàng</span></button>
									</div>
								</div>
							</form>
							<div class="add-to-cart">
								<button id="{{$allsp->MASP}}" onclick="addToWishlist(this.id);" class="add-to-cart-btn"><i class="fa fa-heart"></i> Yêu thích</button>
							</div>
						</div>
					</div>
					<!-- /product -->
					@endforeach

				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<ul class="store-pagination">
						{{-- Hiển thị trang hiện tại --}}
						<li class="active"><span>{{ $tatca_sanpham->currentPage() }}</span></li>

						{{-- Hiển thị liên kết trang trước --}}
						@if ($tatca_sanpham->currentPage() > 1)
						<li><a href="{{ $tatca_sanpham->url($tatca_sanpham->currentPage() - 1) }}"><i class="fa fa-angle-left"></i></a></li>
						@endif

						{{-- Hiển thị các liên kết trang --}}
						@foreach ($tatca_sanpham->getUrlRange(1, $tatca_sanpham->lastPage()) as $page => $url)
						<li class="{{ $tatca_sanpham->currentPage() == $page ? 'active' : '' }}">
							<a href="{{ $url }}">{{ $page }}</a>
						</li>
						@endforeach

						{{-- Hiển thị liên kết trang tiếp theo --}}
						@if ($tatca_sanpham->currentPage() < $tatca_sanpham->lastPage())
							<li><a href="{{ $tatca_sanpham->url($tatca_sanpham->currentPage() + 1) }}"><i class="fa fa-angle-right"></i></a></li>
							@endif
					</ul>
				</div>

				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<script>
	//

	// JavaScript để xử lý sự kiện khi nhấn "Tất cả thương hiệu"
	document.querySelector('.input-checkbox:last-child').addEventListener('click', function() {
		// Chuyển hướng đến trang hiển thị tất cả thương hiệu
		window.location.href = "{{URL::to('/tat-ca-thuong-hieu')}}";
	});
	//wishlist
	//Delete wishlist
</script>
@endsection