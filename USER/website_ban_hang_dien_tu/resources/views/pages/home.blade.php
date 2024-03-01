@extends('layout')
@section('content')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('public/frontend/img/shop01.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Chính hãng</h3>
                        <a href="{{URL::to('/san-pham')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('public/frontend/img/shop03.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Phụ kiện<br>Giá rẻ</h3>
                        <a href="{{URL::to('/san-pham')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('public/frontend/img/shop02.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Máy ảnh<br>Siêu rõ nét</h3>
                        <a href="{{URL::to('/san-pham')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản Phẩm Của Chúng Tôi</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @foreach($loaisanpham as $key => $value)
                            <li><a href="{{URL::to('/san-pham-theo-loai/'.$value->MALOAI)}}"">{{$value->TENLOAI}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class=" col-md-12">
                                    <div class="row">
                                        <div class="products-tabs">
                                            <!-- tab -->
                                            <div id="tab1" class="tab-pane active">
                                                <div class="products-slick" data-nav="#slick-nav-1">
                                                    <!-- product -->
                                                    @foreach($sanpham as $key => $allsp)
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
                                                <div id="slick-nav-1" class="products-slick-nav"></div>
                                            </div>
                                            <!-- /tab -->
                                        </div>
                                    </div>
                    </div>
                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->



        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Sản phẩm HOT</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    @foreach($loaisanpham as $key => $value)
                                    <li><a href="{{URL::to('/san-pham-theo-loai/'.$value->MALOAI)}}"">{{$value->TENLOAI}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class=" col-md-12">
                                            <div class="row">
                                                <div class="products-tabs">
                                                    <!-- tab -->
                                                    <div id="tab2" class="tab-pane fade in active">
                                                        <div class="products-slick" data-nav="#slick-nav-2">
                                                            <!-- product -->
                                                            @foreach($sanpham2 as $key => $allsp)
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
                                                            <!-- /product -->

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
                @endsection