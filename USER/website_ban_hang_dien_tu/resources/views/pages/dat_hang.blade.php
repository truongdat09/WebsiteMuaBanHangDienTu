@extends('layout')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <?php
                $thongbaotb = session('thongbao');

                if ($thongbaotb) {
                    echo '<h1 style="text-align:center">' . $thongbaotb . '</h1>';

                    // Hủy biến session 'thongbaovnpay'
                    session()->forget('thongbao');
                }
                ?>
                <h5 style="text-align: center;">Cảm ơn quý khách đã mua hàng.</h5>
                <img src="{{asset('public/frontend/img/byebye.gif')}}" width="30%" style="border-radius: 50%;display: block; margin: auto;">
            </div>
        </div>

    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection