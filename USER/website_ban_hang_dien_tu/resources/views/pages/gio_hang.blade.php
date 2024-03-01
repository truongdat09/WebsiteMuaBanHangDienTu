@extends('layout')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="section">
  <h2 style="text-align:center;">CHI TIẾT GIỎ HÀNG</h2>
  @php
  $content = Cart::content();
  @endphp
  <div class="container">
    <h4>GIỎ HÀNG&nbsp;({{Cart::content()->count()}}&nbsp;sản phẩm)</h4>
    <table id="cart" class="table table-hover table-condensed">
      <thead>
        <tr>
          <th style="width: 40%"></th>
          <!-- <th style="width:10%">Giá</th> -->
          <th style="width:6%">Số lượng</th>
          <th style="width:22%" class="text-center">Thành tiền</th>
          <th style="width:5%"></th>
        </tr>
      </thead>
      <tbody>
        @if(count($content) > 0)
        @foreach($content as $key => $value_content)
        <tr>
          <td data-th="Product">
            <div class="row">
              <div class="col-sm-2 hidden-xs">
                <img src="{{ URL::to('public/frontend/img/'.$value_content->options->image) }}" alt="..." class="img-responsive" />
              </div>
              <div class="col-sm-10">
                <a style="font-size:20px;" href="{{ URL::to('/chi-tiet-san-pham/'.$value_content->id) }}">{{ $value_content->name }}</a>
                <br><br>
                <p>{{ number_format($value_content->price, 0, '.', '.') }} ₫</p>
              </div>
            </div>
            <!-- </td>
          <td data-th="Price">{{ number_format($value_content->price, 0, '.', '.') }} ₫</td> -->
            <form action="{{URL::to('/cap-nhat-gio-hang')}}" method="post">
              {{csrf_field()}}
          <td data-th="Quantity">
            <input style="font-size:20px;" type="number" name="qty_cart" class="form-control text-center" value="{{ $value_content->qty }}" min="1">
            <input name="masp" type="hidden" value="{{ $value_content->id }}">
            <input name="tensp" type="hidden" value="{{ $value_content->name }}">
          </td>
          <td data-th="Subtotal" class="text-center" style="font-size:20px;">{{ number_format(($value_content->price * $value_content->qty), 0, '.', '.') }} ₫</td>
          <td class="actions" data-th="">
            <input type="hidden" value="{{$value_content->rowId}}" name="rowId_cart">
            <button style="font-size:20px;" type="submit" name="cap_nhat_so_luong" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
            </form>
            <a style="font-size:20px;" href="{{ URL::to('/xoa-gio-hang/'.$value_content->rowId) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')">
              <i class="fa fa-trash-o"></i>
            </a>
          </td>
        </tr>
        @endforeach
        @else
        <tr>
          <td style="font-size:20px" colspan="5" class="text-center">Không có sản phẩm nào trong giỏ hàng.</td>
        </tr>
        @endif
      </tbody>

      <tfoot>
        @if(session('khongdusl') && session('tensp'))
        <i style="color:red;">Sản phẩm {{session('tensp')}} {{ session('khongdusl') }}</i>
        {{-- Xóa thông báo sau khi hiển thị --}}
        {{ session()->forget('khongdusl') }}
        {{ session()->forget('tensp') }}
        @endif
        <tr class="visible-xs">
          <td class="text-center"><strong>Thành tiền {{ Cart::priceTotal(0,',','.') }} ₫</strong></td>
        </tr>
        <tr>
          <td>
            <br>
            <a style="font-size:20px;" href="{{URL::to('/san-pham')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua</a>
            @if(count(Cart::content()) > 0)
            <a style="font-size:20px;" href="{{URL::to('/huy-gio-hang')}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn huỷ toàn bộ giỏ hàng không?')">Huỷ giỏ hàng <i class="fa fa-angle-right"></i></a>
            @endif
          </td>
          <td colspan="1" class="hidden-xs"></td>
          <td style="margin-left: 0 auto;" class="hidden-xs text-left">
            <br>
            <strong style="font-size:20px;">Tổng tiền : </strong><b style="font-size:20px; color:red;">{{ Cart::total(0,',','.') }} ₫</b><br>
            <strong style="font-size:20px;">Phí vận chuyển : </strong><b style="font-size:20px;">Free</b><br>
            <!-- <strong style="font-size:20px;">Thuế : </strong>{{ Cart::tax(0,',','.') }} ₫ -->
          </td>
          <td>
            <br>
            <?php
            $MAKH = session('SDT');
            if ($MAKH != null) {
            ?>
              <a style="font-size:20px;" href="{{URL::to('/thanh-toan')}}" class="btn btn-danger" @if(count(Cart::content())==0) disabled @endif>
                TIẾP TỤC <i class="fa fa-angle-right"></i>
              </a>
            <?php
            } else {
            ?>
              <a style="font-size:20px;" href="{{URL::to('/dang-nhap')}}" class="btn btn-danger" @if(count(Cart::content())==0) disabled @endif>
                TIẾP TỤC <i class="fa fa-angle-right"></i>
              </a>
            <?php
            }
            ?>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
<br>
<br>
<!-- <script>
  document.getElementById('btnThanhToan').addEventListener('click', function() {
    // Hiển thị form thanh toán VnPay
    document.getElementById('vnpayForm').style.display = 'block';
    document.getElementById('momoForm').style.display = 'block';
    // Hiển thị form thanh toán MoMo nếu đúng điều kiện
    // if (parseFloat("{{ Cart::total(0, ',', '.') }}") > 10000 && parseFloat("{{ Cart::total(0, ',', '.') }}") < 50000000) {
    //   document.getElementById('momoForm').style.display = 'block';
    // }
  });
</script> -->
@endsection