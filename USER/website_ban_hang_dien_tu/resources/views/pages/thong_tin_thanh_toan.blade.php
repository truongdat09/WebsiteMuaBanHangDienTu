@extends('layout')
@section('content')

<div class="container">
    @php
    $content = Cart::content();
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <br>
            <h4>ĐỊA CHỈ GIAO HÀNG</h4>
            <form action="#" method="post">
                @csrf
                <div class="mb-3">
                    <label for="receiver_name" class="form-label">Họ và tên</label><b style="color:red"> *</b><br>
                    <?php
                    $tenNH = session('tenNhanHang');
                    echo '<input type="text" placeholder="Vui lòng nhập họ tên" class="form-control" id="receiver_name" name="receiver_name" value="' . htmlspecialchars($tenNH, ENT_QUOTES, 'UTF-8') . '" required>';
                    ?>
                </div>
                <br>
                <div class="mb-3">
                    <label for="receiver_phone" class="form-label">Số điện thoại</label><b style="color:red"> *</b><br>
                    <?php
                    $sdtNH = session('SDTNhanHang');
                    echo '<input type="text" placeholder="Vui lòng nhập số điện thoại" class="form-control" id="receiver_name" name="receiver_name" value="' . htmlspecialchars($sdtNH, ENT_QUOTES, 'UTF-8') . '" required>';
                    ?>
                </div>
                <br>
                <div class="">
                    <label>Tỉnh/Thành Phố</label>
                    <div class="">
                        <div class="">
                            <select style="font-size: 17px;">
                                <option value="" selected="" data-select2-id="9">Chọn tỉnh/thành Phố</option>
                                <option value="485">Hồ Chí Minh</option>
                                <option value="486">Hải Phòng</option>
                                <option value="487">Hà Nội</option>
                                <option value="488">Đà Nẵng</option>
                                <option value="489">Hưng Yên</option>
                                <option value="490">Hải Dương</option>
                                <option value="491">Quảng Ninh</option>
                                <option value="492">Bắc Ninh</option>
                                <option value="493">Bắc Giang</option>
                                <option value="494">Lạng Sơn</option>
                                <option value="495">Thái Nguyên</option>
                                <option value="496">Bắc Kạn</option>
                                <option value="497">Cao Bằng</option>
                                <option value="498">Vĩnh Phúc</option>
                                <option value="499">Phú Thọ</option>
                                <option value="500">Tuyên Quang</option>
                                <option value="501">Hà Giang</option>
                                <option value="502"> Yên Bái</option>
                                <option value="503">Lào Cai</option>
                                <option value="504">Hòa Bình</option>
                                <option value="505">Sơn La</option>
                                <option value="506">Điện Biên</option>
                                <option value="507">Lai Châu</option>
                                <option value="508">Hà Nam</option>
                                <option value="509">Thái Bình</option>
                                <option value="510">Nam Định</option>
                                <option value="511">Ninh Bình</option>
                                <option value="512">Thanh Hóa</option>
                                <option value="513">Nghệ An</option>
                                <option value="514">Hà Tĩnh</option>
                                <option value="515">Quảng Bình</option>
                                <option value="516">Quảng Trị</option>
                                <option value="517">Thừa Thiên - Huế</option>
                                <option value="518">Quảng Nam</option>
                                <option value="519">Quảng Ngãi</option>
                                <option value="520">Kon Tum</option>
                                <option value="521">Bình Định</option>
                                <option value="522">Gia Lai</option>
                                <option value="523">Phú Yên</option>
                                <option value="524">Đắk Lắk</option>
                                <option value="525">Đăk Nông</option>
                                <option value="526">Khánh Hòa</option>
                                <option value="527">Ninh Thuận</option>
                                <option value="528">Lâm Đồng</option>
                                <option value="529">Bà Rịa - Vũng Tàu</option>
                                <option value="530">Bình Thuận</option>
                                <option value="531">Đồng Nai</option>
                                <option value="532">Bình Dương</option>
                                <option value="533">Bình Phước</option>
                                <option value="534">Tây Ninh</option>
                                <option value="535">Long An</option>
                                <option value="536">Tiền Giang</option>
                                <option value="537">Đồng Tháp</option>
                                <option value="538">An Giang</option>
                                <option value="539">Vĩnh Long</option>
                                <option value="540">Cần Thơ</option>
                                <option value="541">Hậu Giang</option>
                                <option value="542">Kiên Giang</option>
                                <option value="543">Bến Tre</option>
                                <option value="544">Trà Vinh</option>
                                <option value="545">Sóc Trăng</option>
                                <option value="546">Bạc Liêu</option>
                                <option value="547">Cà Mau</option>
                            </select>
                            <!-- <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 228px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-fhs_shipping_city_select-container"><span class="select2-selection__rendered" id="select2-fhs_shipping_city_select-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Chọn tỉnh/thành Phố</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            <input class="fhs-textbox require_check check_shipping_address" style="display: none;" type="text" validate_type="text" placeholder="Nhập tỉnh/thành Phố" id="fhs_shipping_city" name="city" value="" maxlength="200"> -->
                        </div>
                    </div>
                </div>
                <br>
                <div class="mb-3">
                    <label for="receiver_address" class="form-label">Địa chỉ nhận hàng</label><b style="color:red"> *</b><br>
                    <?php
                    $diaChiNH = session('diaChiNhanHang');
                    echo '<input type="text" placeholder="Vui lòng nhập địa chỉ nhận hàng" class="form-control" id="receiver_name" name="receiver_name" value="' . htmlspecialchars($diaChiNH, ENT_QUOTES, 'UTF-8') . '" required>';
                    ?>
                </div>
                <br>
            </form>
            <hr>
        </div>
        
        <h1>Chọn Hình Thức Thanh Toán</h1>

        <form id="paymentForm" action="#" method="post">
            <label>
                <input type="radio" name="payment" value="vnpay">
                VNPAY
            </label>
            <label>
                <input type="radio" name="payment" value="momo">
                MOMO
            </label>
            <label>
                <input type="radio" name="payment" value="cash_on_delivery">
                Thanh Toán Khi Nhận Hàng
            </label>

            <input type="button" value="Thanh Toán" onclick="processPayment()">
        </form>

        <td>
            <form id="thanhtoanvnpay" action="{{ url('/thanh-toan-vnpay')}}" method="POST" style="float: left;">
                @csrf
                <!-- <input style="transform: scale(1.5); margin-right:5px;" type="radio"> -->
                <input type="hidden" name="tongtien_vnpay" value="{{ (float) str_replace(['.', ','], '', Cart::total(0,',','.')) }}">
                <button name="redirect" type="submit" class="btn btn-default" style="border: none;">
                    <img style="max-width: 80px;" src="{{asset('public/frontend/img/vnpay_logo.png')}}" alt="VNPAY">
                    <a href="">Cổng thanh toán VNPay</a>
                </button>
            </form>
        </td>
        <br><br><br><br>
        <td>
            <form id="thanhtoanmomo" action="{{ url('/thanh-toan-momo')}}" method="POST" style="float: left;">
                @csrf
                <!-- <input style="transform: scale(1.5); margin-right:5px;" type="radio"> -->
                <input type="hidden" name="tongtien_momo" value="{{ (float) str_replace(['.', ','], '', Cart::total(0, ',', '.')) }}">
                <button disabled name="payUrl" type="submit" class="btn btn-default btn-block" style="border: none;">
                    <img style="max-width: 40px;" src="{{asset('public/frontend/img/momopay.png')}}" alt="MOMO">
                    <a href="" style="margin-left:50px;">Thanh toán ví MOMO</a>
                </button>
            </form>
        </td>
        <hr>
        <h4>KIỂM TRA LẠI ĐƠN HÀNH</h4>
        <tbody>
            @foreach($content as $key => $value_content)
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="{{ URL::to('public/frontend/img/'.$value_content->options->image) }}" alt="..." class="img-responsive" />
                        </div>
                        <div class="col-sm-10">
                            <a style="font-size:20px;" href="{{ URL::to('/chi-tiet-san-pham/'.$value_content->id) }}">{{ $value_content->name }}</a>
                            <br><br>
                            Giá bán:
                            <b>{{ number_format($value_content->price, 0, '.', '.') }} ₫</b>
                            <br>
                            Số lượng mua:
                            <b name="qty_cart">{{ $value_content->qty }}</b>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <hr>
        <div class="fixed-container">
            <strong style="font-size:20px;">Tổng tiền đơn hàng : </strong>
            <b style="font-size:20px; color:red;">{{ Cart::total(0,',','.') }} ₫</b><br><br><br>
            <button name="THANHTOAN" type="button" title="Xác nhận thanh toán" class="btn btn-danger btn-block">
                <span style="font-weight: bold;">THANH TOÁN</span>
            </button>
        </div>
        <hr><br>
    </div>
</div>
<td id="thanhToanNhanHang">
    <input type="radio" id="thanhToanNhanHangRadio" name="paymentMethod">
    <label for="thanhToanNhanHangRadio">
        <a style="border: none;" href="{{ URL::to('/login-thanh-toan') }}" class="btn btn-default">
            <img style="max-width: 80px;" src="{{asset('public/frontend/img/thanhtoankhinhanhang.png')}}" alt="#">
            Thanh toán khi nhận hàng
        </a>
    </label>
</td>

<script>
    function processPayment() {
        var selectedPayment = document.querySelector('input[name="payment"]:checked');

        if (selectedPayment) {
            var paymentMethod = selectedPayment.value;

            // Thực hiện hành động tương ứng với hình thức thanh toán
            if (paymentMethod === "momo") {
                alert("Thanh toán ví điện tử MOMO");
                document.getElementById("thanhtoanmomo").submit();
                // Thực hiện các hành động khác nếu cần thiết
            } else if (paymentMethod === "vnpay") {
                    alert("Chuyển hướng đến cổng thanh toán VNPay");
                    // Submit biểu mẫu
                    document.getElementById("thanhtoanvnpay").submit();
                // Thực hiện các hành động khác nếu cần thiết
            } else {
                // Thực hiện các hành động khác nếu có hình thức thanh toán khác
                alert("Chuyển hướng đến trang đăng nhập thanh toán khi nhận hàng");
                window.location.href = "{{ URL::to('/login-thanh-toan') }}";
            }
        } else {
            alert("Vui lòng chọn hình thức thanh toán");
        }
    }
</script>
@endsection