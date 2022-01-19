<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
class SanPhamController extends Controller
{
    function listProduct(){
        $danhSach = SanPham::all();
        return json_encode([
            'success' => true,
            'data' => $danhSach
        ]);
    }

    // Lấy chi tiết sản phẩm
    function detail($id){
        $sanPham = SanPham::find($id);
        if(empty($sanPham)){
            return json_encode([
                'success' => false,
                'message' => "Không tồn tại sản phẩm {$id}"
            ]);
        }
        else{
            return json_encode([
                'success' => true,
                'data'    => $sanPham
            ]);
        }
    }

    //Thêm mới sản phẩm
    function create(Request $request){
        //  dd($request->ten_sp);
        $sanPham = new SanPham();
        $sanPham->ten_sp = $request->ten_sp;
        $sanPham->dong_sp = $request->dong_sp;
        $sanPham->mota = $request->mota;
        $sanPham->ton_kho = $request->ton_kho;
        $sanPham->gia = $request->gia;
        $sanPham->hinh = $request->hinh;
        $sanPham->save();
        return json_encode([
            'success' => true,
            'message' => "Tạo thành công sản phẩm {$sanPham->id}"
        ]);
    }
}
