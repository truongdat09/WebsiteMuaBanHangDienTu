@extends('layout')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Địa chỉ giao hàng</h3>
                    </div>
                    <div class="form-group">
                        <label for="">Họ & tên người nhận</label>
                        <?php
                        $tenNH = session('tenNhanHang');
                        echo '<input class="input" type="text" name="full-name" value="' . htmlspecialchars($tenNH, ENT_QUOTES, 'UTF-8') . '" placeholder="Họ và tên" disabled>';
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="">Email đặt hàng</label>
                        <?php
                        $email = session('email');
                        echo '<input class="input" type="email" name="email" value="' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '" placeholder="Email" disabled>';
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ nhận hàng</label>
                        <?php
                        $diaChiNhanHang = session('diaChiNhanHang');
                        echo '<input class="input" type="text" name="address" value="' . htmlspecialchars($diaChiNhanHang, ENT_QUOTES, 'UTF-8') . '" placeholder="Địa chỉ" disabled>';
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại nhận hàng</label>
                        <?php
                        $SDTNhanHang = session('SDTNhanHang');
                        echo '<input class="input" type="tel" name="tel" value="' . htmlspecialchars($SDTNhanHang, ENT_QUOTES, 'UTF-8') . '" placeholder="Số điện thoại" disabled>';
                        ?>

                    </div>
                    <!-- <div class="form-group">
                        <div class="input-checkbox">
                            <input type="checkbox" id="create-account">
                            <label for="create-account">
                                <span></span>
                                Create Account?
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                <input class="input" type="password" name="password" placeholder="Enter Your Password">
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- /Billing Details -->

                <!-- Shiping Details -->
                <div class="shiping-details">
                    <div class="input-checkbox">
                        <input type="checkbox" id="shiping-address">
                        <label for="shiping-address">
                            <span></span>
                            Giao hàng đến địa chỉ khác?
                        </label>
                        <div class="caption">
                            <div class="form-group">
                                <?php
                                $SDT = session('SDT');
                                ?>
                                <a href="{{URL::to('/thong-tin-tai-khoan/'.$SDT.'')}}" class="btn btn-danger">Cập nhật địa chỉ giao hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Shiping Details -->

                <!-- Order notes -->
                <!-- <div class="order-notes">
                    <textarea class="input" placeholder="Địa chỉ giao hàng chi tiết"></textarea>
                </div> -->
                <!-- /Order notes -->
            </div>
            @php
            $content = Cart::content();
            @endphp
            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <form action="{{URL::to('/thanh-toan-don-hang')}}" method="post">
                    @csrf
                    <div class="section-title text-center">
                        <h3 class="title">đơn hàng của bạn</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>SẢN PHẨM</strong></div>
                            <div><strong>THÀNH TIỀN</strong></div>
                        </div>
                        <div class="order-products">
                            @foreach($content as $key => $value_content)
                            <div class="order-col">
                                <div>{{ $value_content->qty }}x {{ $value_content->name }}</div>
                                <div>{{ number_format(($value_content->price * $value_content->qty), 0, '.', '.') }} ₫</div>
                            </div>
                            @endforeach
                        </div>
                        <div class="order-col">
                            <div>Phí vận chuyển</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TỔNG TIỀN</strong></div>
                            <div><strong class="order-total">{{ Cart::total(0,',','.') }}</strong></div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <h5>HÌNH THỨC THANH TOÁN</h5>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-TTTT" onchange="updateValues(),changeDisplay()">
                            <label for="payment-TTTT">
                                <img style="max-width: 50px;" src="{{asset('public/frontend/img/thanhtoantructiep2.png')}}" alt="">
                                <span></span>
                                Thanh toán trực tiếp khi nhận hàng
                            </label>
                            <div class="caption">
                                <p style="text-align: justify;">Với phương thức thanh toán này, quý khách thanh toán bằng tiền mặt cho nhân viên giao hàng ngay khi nhận được đơn hàng của mình.</p>
                            </div>
                        </div>

                        <div class="input-radio">
                            <input type="hidden" name="tongtien_momo" value="{{ (float) str_replace(['.', ','], '', Cart::total(0, ',', '.')) }}">
                            <input type="radio" name="payment" id="payment-MOMO" onchange="updateValues(),changeDisplay()">
                            <label for="payment-MOMO">
                                <img style="max-width: 50px;" src="{{asset('public/frontend/img/momopay2.png')}}" alt="">
                                <span></span>
                                Cổng thanh toán MOMO
                            </label>
                            <div class="caption">
                                <p style="text-align: justify;">MoMo tự hào là ví điện tử số 1 Việt Nam với hơn 23 triệu người tin dùng. Với Ví MoMo, khách hàng hoàn toàn an tâm thanh toán và chuyển tiền trên di động mọi lúc, mọi nơi.</p>
                            </div>
                        </div>

                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-VNPAY" onchange="updateValues(),changeDisplay()">
                            <label for="payment-VNPAY">
                                <img style="max-width: 50px;" src="{{asset('public/frontend/img/vnpay_logo.png')}}" alt="">
                                <span></span>
                                Cổng thanh toán VNPAY
                            </label>
                            <div class="caption">
                                <p style="text-align: justify;">Là giải pháp thanh toán cho phép khách hàng sử dụng TÍNH NĂNG quét mã QR được tích hợp sẵn trong ứng dụng ngân hàng hoặc ví điện tử và quét mã vnpay để thanh toán giao dịch.</p>
                            </div>
                        </div>
                    </div>
                    <div class="input-checkbox">
                        <label for="terms">
                            <span></span>
                            <a href="{{URL::to('/san-pham')}}">Mua thêm sản phẩm?</a>
                        </label>
                    </div>
                    <input type="hidden" id="MAHD" name="MAHD">
                    <input type="hidden" name="NGAYLAP" id="NGAYLAP">
                    <input type="hidden" id="MAHT" name="MAHT">
                    <input type="hidden" id="MATT" name="MATT">
                    <input type="hidden" name="tongtien" value="{{ (int) str_replace(['.', ','], '', Cart::total(0, ',', '.')) }}">
                    <div id="btnDatHang">
                        <button type="submit" name="redirect" id="btnThanhToan" class="primary-btn order-submit btn-block"> ĐẶT HÀNG</button>
                    </div>
                </form>
                <!-- nút thanh toán ẩn -->
                <div class="input-checkbox">
                    <form action="{{ url('/thanh-toan-momo')}}" method="post" id="thanhtoanmomo" style="display: none;" onchange="">
                        @csrf      
                        <input type="hidden" name="NGAYLAP_momo" id="NGAYLAP_momo">                  
                        <button class="primary-btn order-submit btn-block" type="submit" name="payUrl">
                            <input type="hidden" name="tongtien_momo" value="{{ (float) str_replace(['.', ','], '', Cart::total(0, ',', '.')) }}">
                            <label for="payment-3">
                                <span></span>
                                <b>ĐẶT HÀNG</b>
                            </label>
                        </button>
                    </form>
                    <form action="{{ url('/thanh-toan-vnpay')}}" method="post" id="thanhtoanvnpay" style="display:none;">
                        @csrf
                        <input type="hidden" name="NGAYLAP_vnpay" id="NGAYLAP_vnpay">
                        <button class="primary-btn order-submit btn-block" type="submit" name="redirect">
                            <input type="hidden" name="tongtien_vnpay" value="{{ (float) str_replace(['.', ','], '', Cart::total(0, ',', '.')) }}">
                            <label for="payment-3">
                                <b>ĐẶT HÀNG</b>
                            </label>
                        </button>
                    </form>
                </div>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<script>
    // Function để lấy ngày hiện tại và đặt giá trị cho trường input
    function setNgayLap() {
        // Tạo một đối tượng Date đại diện cho ngày và giờ hiện tại
        var currentDate = new Date();

        // Định dạng ngày tháng năm
        var formattedDate = currentDate.getFullYear() + '-' +
            ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
            ('0' + currentDate.getDate()).slice(-2);

        // Lấy thời gian hiện tại
        var hours = ('0' + currentDate.getHours()).slice(-2);
        var minutes = ('0' + currentDate.getMinutes()).slice(-2);
        var seconds = ('0' + currentDate.getSeconds()).slice(-2);

        // Đặt giá trị cho trường input
        document.getElementById('NGAYLAP').value = formattedDate + ' ' + hours + ':' + minutes + ':' + seconds;       
    }
    // Gọi hàm khi trang web được tải
    setNgayLap();
    //
    function setNgayLap_vnpay() {
        // Tạo một đối tượng Date đại diện cho ngày và giờ hiện tại
        var currentDate = new Date();

        // Định dạng ngày tháng năm
        var formattedDate = currentDate.getFullYear() + '-' +
            ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
            ('0' + currentDate.getDate()).slice(-2);

        // Lấy thời gian hiện tại
        var hours = ('0' + currentDate.getHours()).slice(-2);
        var minutes = ('0' + currentDate.getMinutes()).slice(-2);
        var seconds = ('0' + currentDate.getSeconds()).slice(-2);

        // Đặt giá trị cho trường input
        document.getElementById('NGAYLAP_vnpay').value = formattedDate + ' ' + hours + ':' + minutes + ':' + seconds;       
    }
    setNgayLap_vnpay();
    //
    function setNgayLap_momo() {
        // Tạo một đối tượng Date đại diện cho ngày và giờ hiện tại
        var currentDate = new Date();

        // Định dạng ngày tháng năm
        var formattedDate = currentDate.getFullYear() + '-' +
            ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
            ('0' + currentDate.getDate()).slice(-2);

        // Lấy thời gian hiện tại
        var hours = ('0' + currentDate.getHours()).slice(-2);
        var minutes = ('0' + currentDate.getMinutes()).slice(-2);
        var seconds = ('0' + currentDate.getSeconds()).slice(-2);

        // Đặt giá trị cho trường input
        document.getElementById('NGAYLAP_momo').value = formattedDate + ' ' + hours + ':' + minutes + ':' + seconds;       
    }
    setNgayLap_momo();
    //Tạo mã hoá đơn ngẫu nhiên
    function setRandomValue() {
        // Tạo một giá trị ngẫu nhiên (ví dụ: sử dụng Math.random())
        var randomValue = Math.floor(Math.random() * 10000000000);
        // Đặt giá trị cho trường input
        document.getElementById('MAHD').value = randomValue;
    }
    // Gọi hàm khi trang web được tải
    setRandomValue();
    
    //Tạo mã MAHT và mã MATT
    function updateValues() {
        // Kiểm tra xem radio button có id "payment-1" được chọn không
        if (document.getElementById("payment-TTTT").checked) {
            // Nếu được chọn, cập nhật giá trị của MAHT và MATT thành 1
            document.getElementById("MAHT").value = "1";
            document.getElementById("MATT").value = "1";
        } else if (document.getElementById("payment-MOMO").checked) {
            document.getElementById("MAHT").value = "2";
            document.getElementById("MATT").value = "2";
        } else if (document.getElementById("payment-VNPAY").checked) {
            document.getElementById("MAHT").value = "3";
            document.getElementById("MATT").value = "2";
        } else {
            alert('Chưa chọn hình thức');
        }
    }

    function changeDisplay() {
        var momoForm = document.getElementById('thanhtoanmomo');
        var vnPayForm = document.getElementById('thanhtoanvnpay');
        var btnDatHang = document.getElementById('btnDatHang');

        var payment_dathang = document.getElementById('payment-TTTT');
        var payment_momo = document.getElementById('payment-MOMO');
        var payment_vnpay = document.getElementById('payment-VNPAY');

        // $MAKH = session('SDT');
        // if($MAKH != null){
        if (payment_dathang.checked) {
            momoForm.style.display = 'none';
            vnPayForm.style.display = 'none';
            btnDatHang.style.display = 'block';
        } else if (payment_momo.checked) {
            momoForm.style.display = 'block';
            vnPayForm.style.display = 'none';
            btnDatHang.style.display = 'none';
        } else if (payment_vnpay.checked) {
            momoForm.style.display = 'none';
            vnPayForm.style.display = 'block';
            btnDatHang.style.display = 'none';
        } else {
            alert('BYE');
        }
        // }
        // else{
        //     alert('Chua dang nhap');
        // }
    }
</script>
@endsection