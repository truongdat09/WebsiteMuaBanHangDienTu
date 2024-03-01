@extends('layout')
@section('content')
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
								<a href="{{URL::to('/san-pham-theo-thuong-hieu/'.$th->MATUONGHIEU)}}">{{$th->TEN_THUONGHIEU}}</a>
								<small>({{$th->SoLuongSanPham}})</small>
							</label>
						</div>
						@endforeach
						<div class="input-checkbox">
							<label for="brand-1">
								<a>Tất cả thương hiệu</a>
							</label>
						</div>
					</div>
				</div>
				<!-- /aside Widget -->

				<!-- /aside Widget -->
			</div>
			<!-- /ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sắp xếp theo :
							<select class="input-select">
								<option value="0">Mặc định</option>
								<option value="1">Giá bán (Cao - thấp)</option>
								<option value="2">Giá bán (Thấp - cao)</option>
								<option value="3">Mới nhất</option>
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

					</div>
					<!-- <ul class="store-grid">
						<li class="active"><i class="fa fa-th"></i></li>
						<li><a href="#"><i class="fa fa-th-list"></i></a></li>
					</ul> -->
					<ul class="store-grid">
						<!-- <li class="active"><i class="fa fa-th"></i></li>
						<li><a href="#"><i class="fa fa-th-list"></i></a></li> -->
						<h2>{{$sanpham_theothuonghieu->total()}} sản phẩm</h2>
					</ul>
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">
					@foreach($tenthuonghieu as $key => $tenthuonghieu)
					<h2 class="title text-center">{{$tenthuonghieu->TEN_THUONGHIEU}}</h2>
					@endforeach
					<!-- product -->
					@foreach($sanpham_theothuonghieu as $key => $sp_thuonghieu)
					<div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<a href="{{ URL::to('/chi-tiet-san-pham/'.$sp_thuonghieu->MASP) }}" style="display: block; max-width: 100%; height: auto;">
									<img src="{{ URL::to('public/frontend/img/'.$sp_thuonghieu->HINH) }}" alt="" style="width: 100%; height: auto;">
								</a>
								<div class="product-label">
									<!-- <span class="sale"> Giảm 30%</span> -->
									<span class="new">MỚI</span>
								</div>
							</div>
							<form action="{{URL::to('/gio-hang')}}" method="POST">
								{{csrf_field()}}
								<div class="product-body">
									<input name="MASP" type="hidden" value="{{$sp_thuonghieu->MASP}}">
									<input name="qty" type="hidden" value="1">
									<p class="product-category">Thương hiệu: {{ $sp_thuonghieu->TEN_THUONGHIEU }}</p>
									<h3 class="product-name"><a href="{{URL::to('/chi-tiet-san-pham/'.$sp_thuonghieu->MASP)}}">{{$sp_thuonghieu->TENSP}}</a></h3>
									<h4 class="product-price">{{number_format($sp_thuonghieu->GIABAN, 0, '.', '.') }} VNĐ</h4>
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
								<!-- <div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm giỏ hàng</button>
									</div> -->
							</form>
							<div class="add-to-cart">
								<button id="{{$sp_thuonghieu->MASP}}" onclick="addToWishlist(this.id);" class="add-to-cart-btn"><i class="fa fa-heart"></i> Yêu thích</button>
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
						<li class="active"><span>{{ $sanpham_theothuonghieu->currentPage() }}</span></li>

						{{-- Hiển thị liên kết trang trước --}}
						@if ($sanpham_theothuonghieu->currentPage() > 1)
						<li><a href="{{ $sanpham_theothuonghieu->url($sanpham_theothuonghieu->currentPage() - 1) }}"><i class="fa fa-angle-left"></i></a></li>
						@endif

						{{-- Hiển thị các liên kết trang --}}
						@foreach ($sanpham_theothuonghieu->getUrlRange(1, $sanpham_theothuonghieu->lastPage()) as $page => $url)
						<li class="{{ $sanpham_theothuonghieu->currentPage() == $page ? 'active' : '' }}">
							<a href="{{ $url }}">{{ $page }}</a>
						</li>
						@endforeach

						{{-- Hiển thị liên kết trang tiếp theo --}}
						@if ($sanpham_theothuonghieu->currentPage() < $sanpham_theothuonghieu->lastPage())
							<li><a href="{{ $sanpham_theothuonghieu->url($sanpham_theothuonghieu->currentPage() + 1) }}"><i class="fa fa-angle-right"></i></a></li>
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
@endsection