@extends('layout')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <?php
                $thongbao = session('thongbaokhinhanhang');

                if ($thongbao) {
                    echo '<h2 style="text-align: center;">' . $thongbao . '</h2>';

                    // Hủy biến session 'thongbaovnpay'
                    session()->forget('thongbaokhinhanhang');
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