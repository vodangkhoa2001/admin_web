<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;
use App\Models\NhaSanXuat;
use App\Models\DongSanPham;
class APISanPhamController extends Controller
{
    public function getAllProduct(){
        $listProduct = SanPham::all();
        return response()->json($listProduct,200);
    }
    public function getNewProduct(){
        $newPro = DB:: table('SanPham')->orderBy('Created_at','desc')->take(5)->get();
        return response()->json(
            $newPro,
            200,
        );
    }
    public function getProductByType($typeId){
        $products = SanPham:: where ('MaDongSanPham',$typeId)->get();
        if($products->empty()){
            return json_encode([
                'success' => false,
                'message' => "Không tồn tại sản phẩm"
            ]);
        }else{
            return json_encode([
                'success' => true,
                'data'    => $products
            ]);
        }
    }
    // Lấy chi tiết sản phẩm
    public function getProductDetail($id){
        $detailProduct = SanPham::find($id);
        if(empty($detailProduct)){
            return json_encode([
                'success' => false,
                'message' => "Không tồn tại sản phẩm {$id}"
            ]);
        }
        else{
            return json_encode([
                'success' => true,
                'data'    => $detailProduct
            ]);
        }
    }
    //Sản phẩm bán chạy
    public function sellingProduct(){
        $products = DB::select('select SanPham.*, SUM(ChiTietHoaDon.SoLuong) as soluongban from SanPham,ChiTietHoaDon where SanPham.id = ChiTietHoaDon.MaSanPham group by SanPham.id order by soluongban DESC');
        return response()->json($products,200);
    }

    //Thêm mới sản phẩm
    //Thêm nhiều giá trị nên gởi qua biến resquest ko gởi qua uri nữa
    public function create(Request $request){
        //  dd($request->ten_sp);
        $sanPham = new SanPham();
        if (empty($request->TenSanPham)){ 
            return json_encode([
                'success' => false,
                'message'  => 'Vui lòng nhập tên sản phẩm'
            ]);
        }
        if (empty($request->GiaNhap)){ 
            return json_encode([
                'success' => false,
                'message'  => 'Vui lòng nhập giá nhập'
            ]);
        }
        if (empty($request->GiaBan)){ 
            return json_encode([
                'success' => false,
                'message'  => 'Vui lòng nhập giá bán'
            ]);
        }
        if (empty($request->SoLuong)){ 
            return json_encode([
                'success' => false,
                'message'  => 'Vui lòng nhập số lượng'
            ]);
        }
        $ktMaNhaSanXuat = NhaSanXuat::find($request->MaNhaSanXuat);
        if ($ktMaNhaSanXuat==null){ 
            return json_encode([
                'success' => false,
                'message'  => 'Mã nhà sản xuất không tồn tại'
            ]);
        }
        $ktMaDongSanPham = DongSanPham::find($request->MaDongSanPham);
        if ($ktMaDongSanPham==null){ 
            return json_encode([
                'success' => false,
                'message'  => 'Mã dòng sản phẩm không tồn tại'
            ]);
        }
        if (empty($request->MoTa)){ 
            return json_encode([
                'success' => false,
                'message'  => 'Vui lòng nhập mô tả'
            ]);
        }
        if (empty($request->HinhAnh)){ 
            return json_encode([
                'success' => false,
                'message'  => 'Vui lòng thêm hình ảnh'
            ]);
        }
        $sanPham->TenSanPham = $request->TenSanPham;
        $sanPham->GiaNhap = $request->GiaNhap;
        $sanPham->GiaBan = $request->GiaBan;
        $sanPham->SoLuong = $request->SoLuong;
        $sanPham->MaDongSanPham = $request->MaDongSanPham;
        $sanPham->MaNhaSanXuat = $request->MaNhaSanXuat;
        $sanPham->MoTa = $request->MoTa;
        $sanPham->HinhAnh = $request->HinhAnh;
        $sanPham->save();
        return json_encode([
            'success' => true,
            'message' => "Tạo thành công sản phẩm {$sanPham->id}"
        ]);
    }
    public function update(Request $request,$id){
        $ktSanPham = SanPham::find($id);
        if($ktSanPham==null){ 
            return json_encode([
                'success' => false,
                'message' => 'Sản phẩm không tồn tại'
            ]);
        }else{
            if(empty($request->TenSanPham)){
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui lòng nhập tên sản phẩm'
                ]);
            }
            if (empty($request->GiaNhap)){ 
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui lòng nhập giá nhập'
                ]);
            }
            if (empty($request->GiaBan)){ 
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui lòng nhập giá bán'
                ]);
            }
            if (empty($request->SoLuong)){ 
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui lòng nhập số lượng'
                ]);
            }
            $ktMaNhaSanXuat = NhaSanXuat::find($request->MaNhaSanXuat);
            if ($ktMaNhaSanXuat==null){ 
                return json_encode([
                    'success' => false,
                    'message'  => 'Mã nhà sản xuất không tồn tại'
                ]);
            }
            $ktMaDongSanPham = DongSanPham::find($request->MaDongSanPham);
            if ($ktMaDongSanPham==null){ 
                return json_encode([
                    'success' => false,
                    'message'  => 'Mã dòng sản phẩm không tồn tại'
                ]);
            }
            if (empty($request->MoTa)){ 
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui lòng nhập mô tả'
                ]);
            }
            if (empty($request->HinhAnh)){ 
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui lòng thêm hình ảnh'
                ]);
            }
        }
    }
    public function delete($id){
        $sanPham = SanPham:: find($id);
        if(empty($sanPham)){
            return json_encode([
                'success' => false,
                'message' => 'Không tìm thấy sản phẩm'
            ]);
        }
        $sanPham ->delete();
        return json_encode([
            'success' => true,
            'message' => 'Xóa sản phẩm thành công'
        ]);
    }
}
