<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class APIGioHangController extends Controller
{
    public function addToCart(Request $request){
        $cart = GioHang::where('MaSanPham',$request->MaSanPham)->where('MaTaiKhoan',$request->MaTaiKhoan)->first();

        if(empty($cart)){
            $cart = new GioHang();
            $cart->MaTaiKhoan = $request->MaTaiKhoan;
            $cart->MaSanPham = $request->MaSanPham;
            $cart->SoLuong = $request->SoLuong;
            $cart->save();
            return response(['message'=>'thanh cong'],200);
        }else{
            $cart->SoLuong += $request->SoLuong;
            $cart->update();
            return response(['message'=>'thanh cong'],200);
        }
    }
    public function removeCart(Request $request){
        $cart = GioHang::where('MaSanPham',$request->MaSanPham)->where('MaTaiKhoan',$request->MaTaiKhoan)->first();

            $cart->delete();
        return response(['message'=>'thanh cong'],200);
    }
    public function getCart(Request $request){
        $cart = DB::select("SELECT sanpham.*, giohang.soluong as sl  FROM giohang,sanpham WHERE sanpham.id= giohang.MaSanPham and giohang.MaTaiKhoan = '{$request->MaTaiKhoan}'");
        return response(['data'=>$cart],200);
    }
}
