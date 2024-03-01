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
								<small></small>
							</label>
						</div>
						@endforeach
					</div>
				</div>
				
				<div class="aside">
					<h3 class="aside-title">Thương Hiệu Sản Phẩm</h3>
					<div class="checkbox-filter">
						@foreach($thuonghieu as $key => $th)
						<div class="input-checkbox">
							<label for="brand-1">
								<span></span>
								<a href="{{URL::to('/san-pham-theo-thuong-hieu/'.$th->MATUONGHIEU)}}">{{$th->TEN_THUONGHIEU}}</a>
								<small></small>
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
					<ul class="store-grid">
						
						<i>Kết quả tìm kiếm: {{$ketquatimkiem->count()}} sản phẩm</i>
					</ul>
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">
					<!-- product -->
					@foreach($ketquatimkiem as $key => $allsp)
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
						<li class="active"><span>{{ $ketquatimkiem->currentPage() }}</span></li>

						{{-- Hiển thị liên kết trang trước --}}
						@if ($ketquatimkiem->currentPage() > 1)
						<li><a href="{{ $ketquatimkiem->url($ketquatimkiem->currentPage() - 1) }}"><i class="fa fa-angle-left"></i></a></li>
						@endif

						{{-- Hiển thị các liên kết trang --}}
						@foreach ($ketquatimkiem->getUrlRange(1, $ketquatimkiem->lastPage()) as $page => $url)
						<li class="{{ $ketquatimkiem->currentPage() == $page ? 'active' : '' }}">
							<a href="{{ $url }}">{{ $page }}</a>
						</li>
						@endforeach

						{{-- Hiển thị liên kết trang tiếp theo --}}
						@if ($ketquatimkiem->currentPage() < $ketquatimkiem->lastPage())
							<li><a href="{{ $ketquatimkiem->url($ketquatimkiem->currentPage() + 1) }}"><i class="fa fa-angle-right"></i></a></li>
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
@endsection