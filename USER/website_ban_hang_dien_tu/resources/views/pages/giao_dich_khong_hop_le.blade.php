@extends('layout')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center;">Giao dịch không hợp lệ.</h1>
                <h5 style="text-align: center; color:red;">Số tiền hợp lệ từ 5 nghìn đồng đến dưới 50 triệu đồng.</h5>
            </div>

            <img src="{{asset('public/frontend/img/loiloi.gif')}}" width="30%" style="display: block; margin: auto;">
        </div>

    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection