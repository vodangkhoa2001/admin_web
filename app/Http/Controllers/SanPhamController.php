<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\DongSanPham;
use App\Models\NhaSanXuat;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    //chạy lệnh này để hiện ảnh: php artisan storage:link
    // protected function fixImage(SanPham $sanPham){
    //     if(Storage::disk('public')->exists($sanPham->HinhAnh)){
    //         $sanPham->HinhAnh = Storage::url($sanPham->HinhAnh);
    //     }else {
    //         $sanPham->HinhAnh= '/img/no_image_placeholder.png';
    //     }
    // }
    public function index(){
        $lstSanPham = SanPham::all();
        //$lstDongSanPham = DongSanPham::all();
        // foreach($lstSanPham as $sanPham){ 
        //     $this -> fixImage($sanPham);
        // }
        return view('component.product.list_product',compact('lstSanPham'));
    }
    public function show(SanPham $sanPham){
        //$this->fiximage($sanPham);
        return view('component.product.show_product',['sanPham'=>$sanPham]);
    }
    public function edit(SanPham $sanPham){
        //$this->fiximage($sanPham);
        $lstDongSanPham = DongSanPham::all();
        $lstNhaSanXuat = NhaSanXuat::all();
        //return view('component/product/edit_product',['sanPham'=>$sanPham,'lstLoai'=>$lstLoai]);
        return view('component.product.edit_product',['sanPham'=>$sanPham,'lstDongSanPham'=>$lstDongSanPham,'lstNhaSanXuat'=>$lstNhaSanXuat]);
    }
    public function update(Request $request, SanPham $sanPham){
        // if($request->hasFile('HinhAnh')){
        //     $sanPham->HinhAnh=$request->file('HinhAnh')->store('product/images/'.$sanPham->id,'public');
        // }
        if($request->hasFile('hinhanh')){
            $newImg = $request->file('hinhanh')->getClientOriginalName();
            $request->hinhanh->storeAs('product/images', $newImg);
            $sanPham->HinhAnh = $newImg;
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
        $datetime = Date('Ymdhms');
        $countAllProducts = SanPham::all()->count() + 1;
        $chuoiID = $countAllProducts;
        if ($countAllProducts > 99)
            $chuoiID = $countAllProducts;

        if ($countAllProducts > 9)
            $chuoiID = '0' . $countAllProducts;
        else
            $chuoiID = '00' . $countAllProducts;

        $originalId = $chuoiID;
        $finalId = 'SP_' . $datetime . $originalId;
        //return view('component/product/create_product',['lstLoai'=>$lstLoai]);
        return view('component.product.create_product',['lstDongSanPham'=>$lstDongSanPham,'lstNhaSanXuat'=>$lstNhaSanXuat,'finalId'=> $finalId]);
    }
    public function store(Request $request){
        // $validateData = $request->validate([
        //     'TenSanPham'=>['required','unique:san_phams,ten_san_pham','max:255'],//unique không được trùng
        //     'MoTa'=>['required'],
        //     'SoLuong'=>['required','numeric','integer','min:0'],
        //     'GiaNhap'=>['required','numeric','integer','min:0'],
        //     'GiaBan'=>['required','numeric','integer','min:0'],
        //     'DongSanPham'=>['required','numeric','integer'],
        //     'NhaSanXuat'=>['required','numeric','integer'],
        //     'HinhAnh'=>['required','mimetypes:image/*','integer','max:2000'],//hoặc image/png,jpg
        // ]);

        $sanPham= new SanPham;
        $sanPham->id = $request->id;
        $sanPham->TenSanPham = $request->tensanpham;
        $sanPham->MoTa = $request->mota;
        $sanPham->SoLuong = $request->soluong;
        $sanPham->GiaNhap = $request->gianhap;
        $sanPham->GiaBan = $request->giaban;
        $sanPham->MaDongSanPham = $request->dongsanpham;
        $sanPham->MaNhaSanXuat = $request->nhasanxuat;
        $nameImg = $request->file('hinhanh')->getClientOriginalName();
        $request->hinhanh->storeAs('product/images', $nameImg);
        $sanPham->HinhAnh = $nameImg;
        // $sanPham ->fill([
        //     'id'=>$request->input('id'),
        //     'TenSanPham'=>$request->input('tensanpham'),
        //     'MoTa'=>$request->input('mota'),
        //     'SoLuong'=>$request->input('soluong'),
        //     'GiaNhap'=>$request->input('gianhap'),
        //     'GiaBan'=>$request->input('giaban'),
        //     'MaDongSanPham'=>$request->input('dongsanpham'),
        //     'MaNhaSanXuat'=>$request->input('nhasanxuat'),
        //     // 'HinhAnh'=> $request->file('HinhAnh')->getClientOriginalName(),
        //     // $sanPham->HinhAnh = $nameImg,
        //     // $request->HinhAnh->storeAs('admin/images', $nameImg),
        //     $nameImg = $request->file('hinhanh')->getClientOriginalName(),
        //     'HinhAnh'=>$nameImg,
        //     $request->hinhanh->storeAs('product/images', $nameImg),
        // ]);
        $sanPham->save();
        return Redirect::route('sanPham.show',['sanPham'=>$sanPham])->with('message', 'Sản phẩm được tạo thành công với ID: ' . $sanPham->id);
    }
    public function destroy(SanPham $sanPham){
        $sanPham ->delete();
        return Redirect::route('sanPham.index');
    }
    // public function findProductDetailByProduct($masp){
    //     $sp = DB::table('SanPham')->join('ChiTietSanPham', 'SanPham.id','=','ChiTietSanPham.MaSanPham')->where('SanPham.id',$masp)->select('SanPham.*','ChiTietSanPham.*')->first();
    //     //dd($sp);
    //     return view('component.product.product_detail.show_detail',compact('sp'));
    // }

}
