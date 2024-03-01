@extends('layout')
@section('content')

<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>THEO DÕI ĐƠN HÀNG</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">MÃ ĐƠN HÀNG</th>
                            <th scope="col">SỐ ĐIỆN THOẠI</th>
                            <th scope="col">NGÀY ĐẶT</th>
                            <th scope="col">TỔNG TIỀN</th>
                            <th scope="col">TRẠNG THÁI</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hoadon_khachhang as $key => $value)
                        @if($key == 0 || $value->MAHD != $hoadon_khachhang[$key - 1]->MAHD)
                        <tr>
                            <td>{{$value->MAHD}}</td>
                            <td>{{$value->SDT_KH}}</td>
                            <td>{{$value->NGAYLAP}}</td>
                            <td>{{$value->TONGTIEN}}</td>
                            <td>{{$value->TrangThai}}</td>
                            <td><a href="{{URL::to('chi-tiet-don-hang')}}">Xem</a></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</section>
@endsection