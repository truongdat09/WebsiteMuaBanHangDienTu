<?php

// namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class HangHoaController extends Controller
// {

//     public function index()
//     {
//         $title = 'Danh sách sản phẩm';
//         $data = DB::table('sanpham')->get();
//         return view('admin.hanghoa.index', compact('title', 'data'));
//     }
//     public function LoadCusByCateloryID($id)
//     {
//         $hangHoas = DB::table('sanpham')
//             ->where('MALOAI', $id)
//             ->get();

//         return view('admin.hanghoa.index', ['hangHoas' => $hangHoas]);
//     }

//     public function LoadHangHoa()
//     {
//         $hangHoas = DB::table('sanpham')->get();

//         return view('admin.hanghoa.index', ['hangHoas' => $hangHoas]);
//     }

//     public function InsertHH(Request $request)
//     {
//         $request->validate([
//             'MALOAI' => 'required',
//             'TENSP' => 'required|unique:sanpham,TENSP',
//             'MOTA' => 'nullable',
//             'HINH' => 'nullable',
//             'SOLUONG' => 'nullable|integer',
//             'GIABAN' => 'nullable|integer',
//             'MATUONGHIEU' => 'nullable',
//             'TRANGTHAI' => 'required|boolean',
//         ]);

//         $data = $request->only([
//             'MALOAI', 'TENSP', 'MOTA', 'HINH', 'SOLUONG', 'GIABAN', 'MATUONGHIEU', 'TRANGTHAI'
//         ]);

//         DB::table('sanpham')->insert($data);

//         return redirect()->route('admin.hanghoa.index')->with('success', 'Thêm hàng hóa thành công.');
//     }

//     public function UpdateHH(Request $request, $id)
//     {
//         $request->validate([
//             'MALOAI' => 'required',
//             'TENSP' => 'required|unique:sanpham,TENSP,' . $id . ',MASP',
//             'MOTA' => 'nullable',
//             'HINH' => 'nullable',
//             'SOLUONG' => 'nullable|integer',
//             'GIABAN' => 'nullable|integer',
//             'MATUONGHIEU' => 'nullable',
//             'TRANGTHAI' => 'required|boolean',
//         ]);

//         $data = $request->only([
//             'MALOAI', 'TENSP', 'MOTA', 'HINH', 'SOLUONG', 'GIABAN', 'MATUONGHIEU', 'TRANGTHAI'
//         ]);

//         DB::table('sanpham')->where('MASP', $id)->update($data);

//         return redirect()->route('admin.hanghoa.index')->with('success', 'Cập nhật hàng hóa thành công.');
//     }

//     public function DeleteHH($id)
//     {
//         DB::table('sanpham')->where('MASP', $id)->delete();

//         return redirect()->route('admin.hanghoa.index')->with('success', 'Xóa hàng hóa thành công.');
//     }

//     public function CheckMaHH($maHH)
//     {
//         $hangHoa = DB::table('sanpham')->where('MASP', $maHH)->first();

//         return response()->json(['exists' => !is_null($hangHoa)]);
//     }

//     public function SearchHangHoa(Request $request)
//     {
//         $tenHH = $request->input('tenHH');
//         $hangHoas = DB::table('sanpham')
//             ->where('TENSP', 'like', "%$tenHH%")
//             ->get();

//         return view('admin.hanghoa.index', ['hangHoas' => $hangHoas]);
//     }
// }


namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HangHoaController extends Controller
{
    public function index()
    {
        $title = 'Danh sách sản phẩm';
        $data = DB::table('sanpham')->get();
        return view('admin.hanghoa.index', compact('title', 'data'));
    }

    public function create()
    {
        $title = 'Thêm sản phẩm';
        $loaisanpham = DB::table('loaisanppham')->get();
        $thuonghieu = DB::table('thuonghieu')->get();
        return view('admin.hanghoa.insert', compact('title', 'loaisanpham', 'thuonghieu'));
    }

    public function store(Request $request)
    {
        $data = [
            'MASP' => $request->input('MASP'),
            'MALOAI' => $request->input('MALOAI'),
            'TENSP' => $request->input('TENSP'),
            'MOTA' => $request->input('MOTA'),
            'HINH' => $request->input('HINH'),
            'SOLUONG' => $request->input('SOLUONG'),
            'GIABAN' => $request->input('GIABAN'),
            'MATUONGHIEU' => $request->input('MATUONGHIEU'),
        ];

        $status = DB::table('sanpham')->insert($data);

        if ($status) {
            return redirect()->route('admin.hanghoa.index')->with('success', 'Thêm thành công.');
        }

        return back()->with('error', 'Thêm thất bại');
    }

    public function edit($id)
    {
        if (!empty($id)) {
            $title = 'Cập nhật sản phẩm';
            $loaisanpham = DB::table('loaisanppham')->get();
            $thuonghieu = DB::table('thuonghieu')->get();
            $sanPham = DB::table('sanpham')->where('MASP', $id)->first();

            if (!empty($sanPham)) {
                return view('admin.hanghoa.update', compact('title', 'sanPham', 'loaisanpham', 'thuonghieu'));
            }
        }

        return redirect()->route('admin.hanghoa.index')->with('error', 'Sản phẩm không tồn tại.');
    }


    public function update(Request $request)
    {
        $data = [
            'MASP' => $request->input('MASP'),
            'MALOAI' => $request->input('MALOAI'),
            'TENSP' => $request->input('TENSP'),
            'MOTA' => $request->input('MOTA'),
            'HINH' => $request->input('HINH'),
            'SOLUONG' => $request->input('SOLUONG'),
            'GIABAN' => $request->input('GIABAN'),
            'MATUONGHIEU' => $request->input('MATUONGHIEU'),
        ];

        $status = DB::table('sanpham')->where('MASP', $request->input('MASP'))->update($data);

        
        if ($status) {
            return redirect()->route('admin.hanghoa.index')->with('success', 'Cập nhật thành công.');
        }

        return back()->with('error', 'Cập nhật thất bại.');
    }

    public function destroy($id)
    {
        $status = DB::table('sanpham')->where('MASP', $id)->delete();

        if ($status) {
            return redirect()->route('admin.hanghoa.index')->with('success', 'Xóa thành công.');
        }

        return back()->with('error', 'Xóa thất bại.');
    }


    public function showNhapHang()
    {
        $title = 'Danh sách phiếu nhập hàng';
        // $data = DB::table('phieunhap')->get();
        
        $data = DB::table('phieunhap')
        ->join('nhacungcap', 'phieunhap.MANCC', '=', 'nhacungcap.MANCC')
        ->get();

        return view('admin.hanghoa.nhaphang', compact('title', 'data'));
    }

    public function createPhieuNhap()
    {
        $title = 'Thêm phiếu nhập hàng';
        $nhaCungCap = DB::table('nhacungcap')->get();

        return view('admin.hanghoa.nhap', compact('title', 'nhaCungCap'));
    }

    public function storePhieuNhap(Request $request)
    {
        $data = [
            'MAPN' => $request->input('MAPN'),
            'MANCC' => $request->input('MANCC'),
            'NGAYNHAP' => now(), // Sử dụng ngày hiện tại
            'TONGNHAP' => 0, // Sẽ cập nhật sau khi thêm chi tiết phiếu nhập
            'MANV' => null, // Chưa có thông tin nhân viên
        ];

        $status = DB::table('phieunhap')->insert($data);

        if ($status) {
            return redirect()->route('admin.hanghoa.showNhapHang')->with('success', 'Thêm phiếu nhập hàng thành công.');
        }

        return back()->with('error', 'Thêm phiếu nhập hàng thất bại');
    }

    public function showChiTietNhapHang($mapn)
    {
        $title = 'Chi tiết phiếu nhập hàng';
        $data = DB::table('chitiet_pn')
            ->where('MAPN', $mapn)
            ->join('sanpham', 'chitiet_pn.MASP', '=', 'sanpham.MASP')
            ->get();

        return view('admin.hanghoa.chitietnhap', compact('title', 'data', 'mapn'));
    }

    // public function showAddChiTietPhieuNhap($mapn)
    // {
    //     $title = 'Thêm chi tiết phiếu nhập hàng';
    //     return view('admin.hanghoa.addchitietphieunhap', compact('title', 'mapn'));
    // }

    public function showAddChiTietPhieuNhap($mapn)
    {
        $title = 'Thêm chi tiết phiếu nhập hàng';

        $products = DB::table('sanpham')->select('MASP', 'TENSP')->get();
    
        return view('admin.hanghoa.addchitietphieunhap', compact('title', 'mapn', 'products'));
    }
    

    // public function addChiTietPhieuNhap(Request $request, $mapn)
    // {
    //     $data = [
    //         'MAPN' => $mapn,
    //         'MASP' => $request->input('MASP'),
    //         'SL' => $request->input('SL'),
    //         'GIANHAP' => $request->input('GIANHAP'),
    //         'TONGTIENNHAP' => $request->input('SL') * $request->input('GIANHAP'),
    //     ];

    //     // Cập nhật tổng nhập của phiếu nhập
    //     DB::table('phieunhap')->where('MAPN', $mapn)->increment('TONGNHAP', $data['TONGTIENNHAP']);

    //     $status = DB::table('chitiet_pn')->insert($data);

    //     if ($status) {
    //         return redirect()->route('admin.hanghoa.showChiTietNhapHang', ['mapn' => $mapn])->with('success', 'Thêm chi tiết phiếu nhập hàng thành công.');
    //     }

    //     return back()->with('error', 'Thêm chi tiết phiếu nhập hàng thất bại');
    // }


    public function addChiTietPhieuNhap(Request $request, $mapn)
    {
        $data = [
            'MAPN' => $mapn,
            'MASP' => $request->input('MASP'),
            'SL' => $request->input('SL'),
            'GIANHAP' => $request->input('GIANHAP'),
            'TONGTIENNHAP' => $request->input('SL') * $request->input('GIANHAP'),
        ];

        DB::beginTransaction();

        try {
            DB::table('phieunhap')->where('MAPN', $mapn)->increment('TONGNHAP', $data['TONGTIENNHAP']);

            $status = DB::table('chitiet_pn')->insert($data);

            DB::table('sanpham')->where('MASP', $data['MASP'])->increment('SOLUONG', $data['SL']);

            DB::commit();

            if ($status) {
                return redirect()->route('admin.hanghoa.showChiTietNhapHang', ['mapn' => $mapn])->with('success', 'Thêm chi tiết phiếu nhập hàng thành công.');
            }
        } catch (\Exception $e) {
            DB::rollback();
        }

        return back()->with('error', 'Thêm chi tiết phiếu nhập hàng thất bại');
    }
}
