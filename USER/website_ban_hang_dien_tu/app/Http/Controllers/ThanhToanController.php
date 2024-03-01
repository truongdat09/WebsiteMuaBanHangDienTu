<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Utils\Random;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

session_start();
class ThanhToanController extends Controller
{
    public function huygiohang()
    {
        Cart::destroy();
        return Redirect::to('/show-gio-hang');
    }

    public function thanhtoanvnpay(Request $request)
    {
        $data = $request->all();
        $maDonHang = str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
        $ngaylap = $request->NGAYLAP_vnpay;
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8080/DoAnChuyenNganh_CNPM/website_ban_hang_dien_tu/dat-hang";
        $vnp_TmnCode = "B4UV7XAV"; //Mã website tại VNPAY 
        $vnp_HashSecret = "UDHARIMAMWRPQWGMXRZXMJWUQGPELZFC"; //Chuỗi bí mật

        $vnp_TxnRef = $maDonHang; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'thanh toan don hang vnpay';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['tongtien_vnpay'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = '';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }

        // vui lòng tham khảo thêm tại code demo
    }

    public function thanhtoanmomo(Request $request)
    {

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $_POST['tongtien_momo'];
        $orderId = time() . "";
        $redirectUrl = "http://localhost:8080/DoAnChuyenNganh_CNPM/website_ban_hang_dien_tu/dat-hang";
        $ipnUrl = "http://localhost:8080/DoAnChuyenNganh_CNPM/website_ban_hang_dien_tu/san-pham";
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";
        //$requestType = "captureWallet";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        //dd($signature);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );


        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        //dd($result);
        //Just a example, please check more in there  
        if ($amount < 5000 || $amount > 50000000) {
            //echo 'Số tiền giao dịch không hợp lệ. Số tiền hợp lệ từ 5,000 đến dưới 50 triệu đồng';
            return redirect()->to('/giao-dich-khong-hop-le');
        } else {
            return redirect()->to($jsonResult['payUrl']);
            header('Location: ' . $jsonResult['payUrl']);
        }
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function thongtinthanhtoan()
    {
        return view('pages.thong_tin_thanh_toan');
    }

    public function thanh_toan()
    {
        return view('pages.thanh_toan');
    }

    public function thanhtoandonhang(Request $request)
    {
        $tongtienhd = $request->tongtien;

        if ($tongtienhd <= 0) {
            return redirect()->to('/giao-dich-khong-hop-le');
        } else {
            $hoadon = array();
            $hoadon['SDT_KH'] = Session::get('SDT');
            $hoadon['MANV'] = 'QL001';
            $hoadon['NGAYLAP'] = $request->NGAYLAP;
            $hoadon['TONGTIEN'] = $request->tongtien;
            $hoadon['MaHT'] = $request->MAHT;
            $hoadon['MaTT'] = $request->MATT;
            $hoadon['MAHD'] = $request->MAHD;
            $result_hd = DB::table('hoadon')->insert($hoadon);
            //THÊM DỮ LIỆU BẢNG CHI TIẾT HOÁ ĐƠN
            $content = Cart::content();
            foreach ($content as $value) {
                $chitiet_hd['MAHD'] = $request->MAHD;
                $chitiet_hd['MASP'] = $value->id;
                $chitiet_hd['SL'] = $value->qty;
                $chitiet_hd['GIABAN'] = $value->price;
                $result_chitiet_hd = DB::table('chitiet_hd')->insert($chitiet_hd);
            }

            if ($result_hd && $result_chitiet_hd) {
                Session::put('thongbaokhinhanhang', 'Đặt hàng thành công - Thanh toán trực tiếp khi nhận hàng');
                Cart::destroy();
                return redirect('/dat-hang-khi-nhan-hang');
            } else {
                Session::put('thongbaokhinhanhang', 'Đặt hàng thất bại - Thanh toán trực tiếp khi nhận hàng');
                return redirect('dat-hang-khi-nhan-hang');
            }
        }
    }

    public function dat_hang_khi_nhan_hang()
    {
        return view('pages.dat_hang_khi_nhan_hang');
    }

    public function dat_hang()
    {
        //lưu thanh toán vnpay
        if (isset($_GET['vnp_TransactionStatus']) && $_GET['vnp_TransactionStatus'] == '00') {
            $hoadon = array();
            $hoadon['SDT_KH'] = Session::get('SDT');
            $hoadon['MANV'] = 'QL001';
            $hoadon['NGAYLAP'] = $_GET['vnp_PayDate'];
            $hoadon['TONGTIEN'] = $_GET['vnp_Amount'] / 100;
            $hoadon['MaHT'] = 3;
            $hoadon['MaTT'] = 2;
            $hoadon['MAHD'] = $_GET['vnp_TxnRef'];
            DB::table('hoadon')->insert($hoadon);
            //THÊM DỮ LIỆU BẢNG CHI TIẾT HOÁ ĐƠN
            $content = Cart::content();
            foreach ($content as $value) {
                $chitiet_hd['MAHD'] = $_GET['vnp_TxnRef'];
                $chitiet_hd['MASP'] = $value->id;
                $chitiet_hd['SL'] = $value->qty;
                $chitiet_hd['GIABAN'] = $value->price;
                DB::table('chitiet_hd')->insert($chitiet_hd);
            }
            Cart::destroy();
            Session::put('thongbao', 'Thanh toán thành công - Cảm ơn quý khách đã mua hàng - thanh toán vnpay');
            return view('pages.dat_hang');
        } elseif (isset($_GET['resultCode']) && $_GET['resultCode'] == '0') {
            $ngayht = date('Y-m-d H:i:s');
            $hoadon = array();
            $hoadon['SDT_KH'] = Session::get('SDT');
            $hoadon['MANV'] = 'QL001';
            $hoadon['NGAYLAP'] = $ngayht;
            $hoadon['TONGTIEN'] = $_GET['amount'];
            $hoadon['MaHT'] = 2;
            $hoadon['MaTT'] = 2;
            $hoadon['MAHD'] = $_GET['orderId'];
            DB::table('hoadon')->insert($hoadon);
            //THÊM DỮ LIỆU BẢNG CHI TIẾT HOÁ ĐƠN
            $content = Cart::content();
            foreach ($content as $value) {
                $chitiet_hd['MAHD'] = $_GET['orderId'];
                $chitiet_hd['MASP'] = $value->id;
                $chitiet_hd['SL'] = $value->qty;
                $chitiet_hd['GIABAN'] = $value->price;
                DB::table('chitiet_hd')->insert($chitiet_hd);
            }
            Cart::destroy();
            Session::put('thongbao', 'Đặt hàng thành công - Thanh toán Momo');
            return view('pages.dat_hang');
        } else {
            Session::put('thongbao', 'Thanh toán không thành công');
            return view('pages.dat_hang');
        }
        //lưu thanh toán momo
    }

    public function giaodichkhonghople()
    {
        return view('pages.giao_dich_khong_hop_le');
    }
}
