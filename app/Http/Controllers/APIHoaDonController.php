<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIHoaDonController extends Controller
{
    public function getHoaDon($id){
        $invoice = DB::select("select hoadon.*,sanpham.HinhAnh,sanpham.TenSanPham,sanpham.GiaNhap,sanpham.id as maSP,chitiethoadon.SoLuong,taikhoan.HoTen from hoadon,taikhoan,chitiethoadon,sanpham where hoadon.MaTaiKhoan=taikhoan.id and chitiethoadon.MaHoaDon=hoadon.id  and chitiethoadon.MaSanPham = sanpham.id and hoadon.MaTaiKhoan = '{$id}'");
        return response()->json(['data' => $invoice],200);
    }
    public function createInvoice(Request $request){
        $datetime = Date('Ymdhms');
        $countAllHD = HoaDon::all()->count() + 1;
        $chuoiID = $countAllHD;
        if ($countAllHD > 99)
            $chuoiID = $countAllHD;

        if ($countAllHD > 9)
            $chuoiID = '0' . $countAllHD;
        else
            $chuoiID = '00' . $countAllHD;

        $originalId = $chuoiID;
        $finalId = 'HD' . $datetime . $originalId;
        $hoadon = new HoaDon();
        $hoadon->id = $finalId;
        $hoadon->MaTaiKhoan = $request->MaTaiKhoan;
        $hoadon->DiaChiGiaoHang = $request->DiaChiGiaoHang;
        $hoadon->SDT_GiaoHang = $request->SDT_GiaoHang;
        $hoadon->TongTien = $request->TongTien;
        $hoadon->TrangThoai_HoaDon = 1;
        $hoadon->save();
        return response(['message'=>$hoadon->id],200);

    }
    public function addInvoiceDetail($idInvoice,Request $request){
        $cthd = new ChiTietHoaDon();
        $cthd->MaHoaDon = $idInvoice;
        $cthd->MaSanPham = $request->MaSanPham;
        $cthd->SoLuong = $request->SoLuong;
        $cthd->DonGia = $request->DonGia;
        $cthd->DonGiaKhuyenMai = $request->DonGiaKhuyenMai;
        $cthd->TrangThai_ChiTietHoaDon = 1;
        $cthd->save();
        return response(['massage'=>'thanh cong']);
    }
    public function cancleInvoice($id){
        $Invoice = HoaDon::find($id);
        $Invoice->TrangThoai_HoaDon = 0;
        $Invoice->update();
        return response(['message' => 'thanh cong'],200);
    }

}
