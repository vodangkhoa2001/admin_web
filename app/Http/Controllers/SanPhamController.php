<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\DongSanPham;
use App\Models\NhaSanXuat;

class SanPhamController extends Controller
{
    //chạy lệnh này để hiện ảnh: php artisan storage:link
    protected function fixImage(SanPham $sanPham){
        if(Storage::disk('public')->exists($sanPham->HinhAnh)){
            $sanPham->HinhAnh = Storage::url($sanPham->HinhAnh);
        }else {
            $sanPham->HinhAnh= '/img/no_image_placeholder.png';
        }
    }
    public function index(){
        $lstSanPham = SanPham::all();
        // foreach($lstSanPham as $sanPham){ 
        //     $this -> fixImage($sanPham);
        // }
        return view('component.product.list_product',compact('lstSanPham'));
    }
    public function show(SanPham $sanPham){
        $this->fiximage($sanPham);
        return view('component.product.detail_product',['sanPham'=>$sanPham]);
    }
    public function edit(SanPham $sanPham){
        //$this->fiximage($sanPham);
        $lstDongSanPham = DongSanPham::all();
        $lstNhaSanXuat = NhaSanXuat::all();
        //return view('component/product/edit_product',['sanPham'=>$sanPham,'lstLoai'=>$lstLoai]);
        return view('component.product.edit_product',['sanPham'=>$sanPham,'lstDongSanPham'=>$lstDongSanPham,'lstNhaSanXuat'=>$lstNhaSanXuat]);
    }
    public function update(Request $request, SanPham $sanPham){
        if($request->hasFile('HinhAnh')){
            $sanPham->hinh=$request->file('HinhAnh')->store('images/sp/'.$sanPham->id,'public');
        }
        $sanPham->fill([
            'TenSanPham'=>$request->input('tensanpham'),
            'GiaNhap'=>$request->input('gianhap'),
            'GiaBan'=>$request->input('giaban'),
            'SoLuong'=>$request->input('soluong'),
            'MaNhaSanXuat'=>$request->input('nhasanxuat'),
            'MoTa'=>$request->input('mota'),
            'MaDongSanPham'=>$request->input('dongsanpham'),
        ]);
        $sanPham->save();
        return Redirect::route('sanPham.show',['sanPham'=>$sanPham]);
    }
    public function create(){
        $lstDongSanPham= DongSanPham::all();
        $lstNhaSanXuat = NhaSanXuat::all();
        //return view('component/product/create_product',['lstLoai'=>$lstLoai]);
        return view('component.product.create_product',['lstDongSanPham'=>$lstDongSanPham,'lstNhaSanXuat'=>$lstNhaSanXuat]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'TenSanPham'=>['required','unique:san_phams,ten_san_pham','max:255'],//unique không được trùng
            'MoTa'=>['required'],
            'SoLuong'=>['required','numeric','integer','min:0'],
            'GiaNhap'=>['required','numeric','integer','min:0'],
            'GiaBan'=>['required','numeric','integer','min:0'],
            'DongSanPham'=>['required','numeric','integer'],
            'NhaSanXuat'=>['required','numeric','integer'],
            'HinhAnh'=>['required','mimetypes:image/*','integer','max:2000'],//hoặc image/png,jpg
        ]);

        $sanPham= new SanPham;
        $sanPham ->fill([
            'TenSanPham'=>$request->input('tensanpham'),
            'MoTa'=>$request->input('mota'),
            'SoLuong'=>$request->input('soluong'),
            'GiaNhap'=>$request->input('gianhap'),
            'GiaBan'=>$request->input('giaban'),
            'MaDongSanPham'=>$request->input('dongsanpham'),
            'MaNhaSanXuat'=>$request->input('nhasanxuat'),
            'HinhAnh'=>''
        ]);
        $sanPham->save();
        return Redirect::route('sanPham.show',['sanPham'=>$sanPham])->with('message', 'Sản phẩm được tạo thành công với ID: ' . $sanPham->id);
    }
    public function destroy(SanPham $sanPham){
        $sanPham ->delete();
        return Redirect::route('sanPham.index');
    }

}
