<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ctsp;
use App\Models\ChiTietSanPham;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ChiTietSanPhamController extends Controller
{
    public function show($masp){
        $lstCTSP =DB::table('SanPham')->join('ChiTietSanPham', 'SanPham.id','=','ChiTietSanPham.MaSanPham')->where('ChiTietSanPham.MaSanPham',$masp)->select('SanPham.id','ChiTietSanPham.MauSac','ChiTietSanPham.ManHinh')->first();
        //dd($lstCTSP);
        return view('component.product.product_detail.show_detail',['lstCTSP'=>$lstCTSP]);
    }
    public function edit(ChiTietSanPham $ctsp){
        return view('component.product.product_detail.edit_detail',['ctsp'=>$ctsp]);
    }
    public function update(Request $request, ChiTietSanPham $ctsp){
        $ctsp->fill([
            'MauSac'=>$request->input('mausac'),
            'Ram'=>$request->input('ram'),
            'OCung'=>$request->input('ocung'),
            'ManHinh'=>$request->input('manhinh'),
            'CardDoHoa'=>$request->input('carddohoa'),
            'MoTa'=>$request->input('mota'),
            'TrangThai_ChiTietSanPham'=>$request->input('trangthai'),
        ]);
        $ctsp->save();
        return Redirect::route('ctsp.show',['ctsp'=>$ctsp]);
    }
    public function create(){
        $datetime = Date('Ymdhms');
        $countAllProductDetails = ChiTietSanPham::all()->count() + 1;
        $chuoiID = $countAllProductDetails;
        if ($countAllProductDetails > 99)
            $chuoiID = $countAllProductDetails;

        if ($countAllProductDetails > 9)
            $chuoiID = '0' . $countAllProductDetails;
        else
            $chuoiID = '00' . $countAllProductDetails;

        $originalId = $chuoiID;
        $finalId = 'CTSP_' . $datetime . $originalId;
        //return view('component/product/create_product',['lstLoai'=>$lstLoai]);
        return view('component.product.create_product',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        // $validateData = $request->validate([
        //     'Tenctsp'=>['required','unique:san_phams,ten_san_pham','max:255'],//unique không được trùng
        //     'MoTa'=>['required'],
        //     'SoLuong'=>['required','numeric','integer','min:0'],
        //     'GiaNhap'=>['required','numeric','integer','min:0'],
        //     'GiaBan'=>['required','numeric','integer','min:0'],
        //     'Dongctsp'=>['required','numeric','integer'],
        //     'NhaSanXuat'=>['required','numeric','integer'],
        //     'HinhAnh'=>['required','mimetypes:image/*','integer','max:2000'],//hoặc image/png,jpg
        // ]);
        $ctsp= new ChiTietSanPham;
        $ctsp ->fill([
            'MauSac'=>$request->input('mausac'),
            'Ram'=>$request->input('ram'),
            'OCung'=>$request->input('ocung'),
            'ManHinh'=>$request->input('manhinh'),
            'CardDoHoa'=>$request->input('carddohoa'),
            'MoTa'=>$request->input('mota'),
            'TrangThai_ChiTietSanPham'=>$request->input('trangthai'),
        ]);
        $ctsp->save();
        return Redirect::route('ctsp.show',['ctsp'=>$ctsp])->with('message', 'Sản phẩm được tạo thành công với ID: ' . $ctsp->id);
    }
    public function destroy(ChiTietSanPham $ctsp){
        $ctsp ->delete();
        return Redirect::route('ctsp.show');
    }
}
