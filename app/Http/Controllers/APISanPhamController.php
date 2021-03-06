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
        $listProduct = DB::select("SELECT sanpham.*,mausac.TenMau,ocung.TenOCung,ram.TenRam,manhinh.TenManHinh,cpu.TenCPU,carddohoa.TenCardDoHoa from sanpham,mausac,ocung,ram,manhinh,cpu,carddohoa WHERE sanpham.MaMau = mausac.id and sanpham.MaManHinh = manhinh.id and sanpham.MaOCung = ocung.id and sanpham.MaRam = ram.id and sanpham.MaCPU = cpu.id and sanpham.MaCardDoHoa = carddohoa.id and sanpham.TrangThai =1");

        return response()->json(['data' => $listProduct],200);
    }
    public function getNewProduct(){
        $newPro = DB::select('SELECT sanpham.*,mausac.TenMau,ocung.TenOCung,ram.TenRam,manhinh.TenManHinh,cpu.TenCPU,carddohoa.TenCardDoHoa from sanpham,mausac,ocung,ram,manhinh,cpu,carddohoa WHERE sanpham.MaMau = mausac.id and sanpham.MaManHinh = manhinh.id and sanpham.MaOCung = ocung.id and sanpham.MaRam = ram.id and sanpham.MaCPU = cpu.id and sanpham.MaCardDoHoa = carddohoa.id and sanpham.TrangThai =1 order by sanpham.created_at desc limit 5');
        return response()->json(['data' => $newPro],200);
    }
    public function getDiscountProduct(){
        $discountPro = DB::select('SELECT sanpham.*,mausac.TenMau,ocung.TenOCung,ram.TenRam,manhinh.TenManHinh,cpu.TenCPU,carddohoa.TenCardDoHoa from sanpham,mausac,ocung,ram,manhinh,cpu,carddohoa WHERE sanpham.MaMau = mausac.id and sanpham.MaManHinh = manhinh.id and sanpham.MaOCung = ocung.id and sanpham.MaRam = ram.id and sanpham.MaCPU = cpu.id and sanpham.MaCardDoHoa = carddohoa.id and sanpham.SoLuong > 49 and sanpham.TrangThai = 1');
        return response()->json(['data' => $discountPro],200);
    }

    public function getProductByType($typeId){
        $products = DB::select("SELECT sanpham.*,mausac.TenMau,ocung.TenOCung,ram.TenRam,manhinh.TenManHinh,cpu.TenCPU,carddohoa.TenCardDoHoa from sanpham,mausac,ocung,ram,manhinh,cpu,carddohoa WHERE sanpham.MaMau = mausac.id and sanpham.MaManHinh = manhinh.id and sanpham.MaOCung = ocung.id and sanpham.MaRam = ram.id and sanpham.MaCPU = cpu.id and sanpham.MaCardDoHoa = carddohoa.id and sanpham.MaDongSanPham = '{$typeId}'");
        return response()->json(['data' => $products],200);
    }
    // L???y chi ti???t s???n ph???m
    public function getProductDetail($id){
        $detailProduct = new SanPham();
        $detailProduct = DB::select("SELECT sanpham.*,mausac.TenMau,ocung.TenOCung,ram.TenRam,manhinh.TenManHinh,cpu.TenCPU,carddohoa.TenCardDoHoa from sanpham,mausac,ocung,ram,manhinh,cpu,carddohoa WHERE sanpham.MaMau = mausac.id and sanpham.MaManHinh = manhinh.id and sanpham.MaOCung = ocung.id and sanpham.MaRam = ram.id and sanpham.MaCPU = cpu.id and sanpham.MaCardDoHoa = carddohoa.id and sanpham.id = '{$id}'");

        return response()->json(['data' => $detailProduct], 200);
    }
    //S???n ph???m b??n ch???y
    public function sellingProduct(){
        $products = DB::select('select SanPham.*, SUM(ChiTietHoaDon.SoLuong) as soluongban from SanPham,ChiTietHoaDon where SanPham.id = ChiTietHoaDon.MaSanPham group by SanPham.id order by soluongban DESC');
        return response()->json($products,200);
    }

    //Th??m m???i s???n ph???m
    //Th??m nhi???u gi?? tr??? n??n g???i qua bi???n resquest ko g???i qua uri n???a
    public function create(Request $request){
        //  dd($request->ten_sp);
        $sanPham = new SanPham();
        if (empty($request->TenSanPham)){
            return json_encode([
                'success' => false,
                'message'  => 'Vui l??ng nh???p t??n s???n ph???m'
            ]);
        }
        if (empty($request->GiaNhap)){
            return json_encode([
                'success' => false,
                'message'  => 'Vui l??ng nh???p gi?? nh???p'
            ]);
        }
        if (empty($request->GiaBan)){
            return json_encode([
                'success' => false,
                'message'  => 'Vui l??ng nh???p gi?? b??n'
            ]);
        }
        if (empty($request->SoLuong)){
            return json_encode([
                'success' => false,
                'message'  => 'Vui l??ng nh???p s??? l?????ng'
            ]);
        }
        $ktMaNhaSanXuat = NhaSanXuat::find($request->MaNhaSanXuat);
        if ($ktMaNhaSanXuat==null){
            return json_encode([
                'success' => false,
                'message'  => 'M?? nh?? s???n xu???t kh??ng t???n t???i'
            ]);
        }
        $ktMaDongSanPham = DongSanPham::find($request->MaDongSanPham);
        if ($ktMaDongSanPham==null){
            return json_encode([
                'success' => false,
                'message'  => 'M?? d??ng s???n ph???m kh??ng t???n t???i'
            ]);
        }
        if (empty($request->MoTa)){
            return json_encode([
                'success' => false,
                'message'  => 'Vui l??ng nh???p m?? t???'
            ]);
        }
        if (empty($request->HinhAnh)){
            return json_encode([
                'success' => false,
                'message'  => 'Vui l??ng th??m h??nh ???nh'
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
            'message' => "T???o th??nh c??ng s???n ph???m {$sanPham->id}"
        ]);
    }
    public function update(Request $request,$id){
        $ktSanPham = SanPham::find($id);
        if($ktSanPham==null){
            return json_encode([
                'success' => false,
                'message' => 'S???n ph???m kh??ng t???n t???i'
            ]);
        }else{
            if(empty($request->TenSanPham)){
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui l??ng nh???p t??n s???n ph???m'
                ]);
            }
            if (empty($request->GiaNhap)){
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui l??ng nh???p gi?? nh???p'
                ]);
            }
            if (empty($request->GiaBan)){
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui l??ng nh???p gi?? b??n'
                ]);
            }
            if (empty($request->SoLuong)){
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui l??ng nh???p s??? l?????ng'
                ]);
            }
            $ktMaNhaSanXuat = NhaSanXuat::find($request->MaNhaSanXuat);
            if ($ktMaNhaSanXuat==null){
                return json_encode([
                    'success' => false,
                    'message'  => 'M?? nh?? s???n xu???t kh??ng t???n t???i'
                ]);
            }
            $ktMaDongSanPham = DongSanPham::find($request->MaDongSanPham);
            if ($ktMaDongSanPham==null){
                return json_encode([
                    'success' => false,
                    'message'  => 'M?? d??ng s???n ph???m kh??ng t???n t???i'
                ]);
            }
            if (empty($request->MoTa)){
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui l??ng nh???p m?? t???'
                ]);
            }
            if (empty($request->HinhAnh)){
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui l??ng th??m h??nh ???nh'
                ]);
            }
        }
    }
    public function delete($id){
        $sanPham = SanPham:: find($id);
        if(empty($sanPham)){
            return json_encode([
                'success' => false,
                'message' => 'Kh??ng t??m th???y s???n ph???m'
            ]);
        }
        $sanPham ->delete();
        return json_encode([
            'success' => true,
            'message' => 'X??a s???n ph???m th??nh c??ng'
        ]);
    }
}
