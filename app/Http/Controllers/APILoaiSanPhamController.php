<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DongSanPham;
class APILoaiSanPhamController extends Controller
{
    function getAllProductType(){
        $listProductType = DongSanPham::all();
        return response()->json(['data' => $listProductType], 200);
    }
    function getProducTypeDetail($id){
        $detailProductType = DongSanPham::find($id);
        if(empty($detailProductType)){
            return json_encode([
                'success' => false,
                'message' => "Không tồn tại dòng sản phẩm {$id}"
            ]);
        }
        else{
            return json_encode([
                'success' => true,
                'data'    => $detailProductType
            ]);
        }
    }
    function create(Request $request){
        //  dd($request->ten_sp);
        $dongSanPham = new DongSanPham();
        if (empty($request->TenDongSanPham)){
            return json_encode([
                'success' => false,
                'message'  => 'Vui lòng nhập tên dòng sản phẩm'
            ]);
        }
        if (empty($request->TrangThai_DongSanPham)){
            return json_encode([
                'success' => false,
                'message'  => 'Vui lòng thêm trạng thái'
            ]);
        }
        $dongSanPham->TenDongSanPham = $request->TenDongSanPham;
        $dongSanPham->TrangThai_DongSanPham = $request->TrangThai_DongSanPham;
        $dongSanPham->save();
        return json_encode([
            'success' => true,
            'message' => "Tạo thành công sản phẩm {$dongSanPham->id}"
        ]);
    }
    public function update(Request $request,$id){
        $dongSanPham = DongSanPham::find($id);
        if($dongSanPham==null){
            return json_encode([
                'success' => false,
                'message' => 'Dòng sản phẩm không tồn tại'
            ]);
        }else{
            if(empty($request->TenDongSanPham)){
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui lòng nhập tên dòng sản phẩm'
                ]);
            }
            if (empty($request->TrangThai_DongSanPham)){
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui lòng thiết lập trạng thái'
                ]);
            }
        }
        $dongSanPham->TenSanPham = $request->TenSanPham;
        $dongSanPham->TrangThai_DongSanPham = $request->TrangThai_DongSanPham;
        $dongSanPham->save();
        return json_encode([
            'success' => true,
            'message' => "Tạo thành công sản phẩm {$dongSanPham->id}"
        ]);
    }
    public function delete($id){
        $dongSanPham = DongSanPham:: find($id);
        if(empty($dongSanPham)){
            return json_encode([
                'success' => false,
                'message' => 'Không tìm thấy dòng sản phẩm'
            ]);
        }
        $dongSanPham ->delete();
        return json_encode([
            'success' => true,
            'message' => 'Xóa dòng sản phẩm thành công'
        ]);
    }

}
