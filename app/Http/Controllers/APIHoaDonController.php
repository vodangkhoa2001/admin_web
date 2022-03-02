<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HoaDon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIHoaDonController extends Controller
{
    public function getHoaDon($idUser){
        $invoice = DB::select("select hoadon.*,sanpham.HinhAnh,sanpham.TenSanPham,sanpham.GiaNhap,chitiethoadon.SoLuong,taikhoan.HoTen from hoadon,taikhoan,chitiethoadon,sanpham where hoadon.MaTaiKhoan=taikhoan.id and chitiethoadon.MaHoaDon=hoadon.id  and chitiethoadon.MaSanPham = sanpham.id and hoadon.MaTaiKhoan = '{$idUser}'");
        return response()->json(['data' => $invoice],200);
    }
    public function createHoaDon(){

    }
}
