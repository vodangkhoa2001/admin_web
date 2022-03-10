<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use App\Models\SanPham;
use Illuminate\Support\Facades\Redirect;

class PromoteController extends Controller
{
    public function index(){
        $promote = KhuyenMai::paginate(5);
        return view('component.promote.list_promote',compact('promote'));
    }
    public function show($id){
        $promote = KhuyenMai::find($id);
        return view('component.promote.show_promote',compact('promote'));
    }
    public function edit($id){
        $promote = KhuyenMai::find($id);
        $sanPham = SanPham::all();
        return view('component.promote.edit_promote',compact('sanPham','promote'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'masanphamkhuyenmai'=>['required','min:2,max:100'],
            'mota'=>['required','max:255'],
            'soluongkhuyenmai'=>['required','numeric','integer'],
            'dongiakhuyenmai'=>['required','numeric','integer','min:3'],
            'ngaybatdau'=>['required'],
            'ngayketthuc'=>['required'],
        ],[
            'masanphamkhuyenmai.required'=>'Vui lòng nhập tên sản phẩm khuyến mãi !',
            'masanphamkhuyenmai.min'=>'Tên sản phẩm khuyến mãi quá ngắn !',
            'masanphamkhuyenmai.max'=>'Tên sản phẩm khuyến mãi quá dài !',
            'mota.required'=>'Vui lòng nhập mô tả sản phẩm khuyến mãi !',
            'mota.max'=>'Mô tả sản phẩm khuyến mãi quá dài !',
            'soluongkhuyenmai.required'=>'Vui lòng nhập số lượng sản phẩm khuyến mãi !',
            'soluongkhuyenmai.numeric'=>'Số lượng sản phẩm khuyến mãi phải là số !',
            'soluongkhuyenmai.interger'=>'Số lượng sản phẩm khuyến mãi phải là số nguyên !',
            'dongiakhuyenmai.required'=>'Vui lòng nhập giá sản phẩm khuyến mãi !',
            'dongiakhuyenmai.numeric'=>'Giá nhập sản phẩm khuyến mãi phải là số !',
            'dongiakhuyenmai.interger'=>'Giá nhập sản phẩm khuyến mãi phải là số nguyên !',
            'dongiakhuyenmai.min'=>'Đơn sản phẩm khuyến mãi quá nhỏ !',
            'ngaybatdau.required'=>'Vui lòng nhập ngày bắt đầu !',
            'ngayketthuc.required'=>'Vui lòng nhập ngày kết thúc !',
        ]);
        $promote = KhuyenMai::find($id);
        $promote->MaSanPhamKhuyenMai=$request->get('masanphamkhuyenmai');
        $promote->DonGiaKhuyenMai=$request->get('dongiakhuyenmai');
        $promote->SoLuongKhuyenMai=$request->get('soluongkhuyenmai');
        $promote->NgayBatDau=$request->get('ngaybatdau');
        $promote->NgayKetThuc=$request->get('ngayketthuc');
        $promote->MoTa=$request->get('mota');
        $promote->save();
        return Redirect::route('promote.show',compact('promote'));
    }
    public function create(){
        $sanPham= SanPham::all();
        $countAllpromotes = KhuyenMai::all()->count() + 1;
        // $chuoiID = $countAllpromotes;
        // if ($countAllpromotes > 99)
        //     $chuoiID = $countAllpromotes;

        // if ($countAllpromotes > 9)
        //     $chuoiID = '0' . $countAllpromotes;
        // else
        //     $chuoiID = '00' . $countAllpromotes;

        // $originalId = $chuoiID;
        $finalId = $countAllpromotes;
        return view('component.promote.create_promote',['finalId'=> $finalId,'sanPham'=> $sanPham]);
    }
    public function store(Request $request){
        $request->validate([
            'masanphamkhuyenmai'=>['required','unique:khuyenmai','min:2','max:100'],
            'mota'=>['required','max:255'],
            'soluongkhuyenmai'=>['required','numeric','integer'],
            'dongiakhuyenmai'=>['required','numeric','integer','min:3'],
            'ngaybatdau'=>['required'],
            'ngayketthuc'=>['required'],
        ],[
            'masanphamkhuyenmai.required'=>'Vui lòng nhập tên sản phẩm khuyến mãi !',
            'masanphamkhuyenmai.unique'=>'Tên sản phẩm khuyến mãi đã tồn tại !',
            'masanphamkhuyenmai.min'=>'Tên sản phẩm khuyến mãi quá ngắn !',
            'masanphamkhuyenmai.max'=>'Tên sản phẩm khuyến mãi quá dài !',
            'mota.required'=>'Vui lòng nhập mô tả sản phẩm khuyến mãi !',
            'mota.max'=>'Mô tả sản phẩm khuyến mãi quá dài !',
            'soluongkhuyenmai.required'=>'Vui lòng nhập số lượng sản phẩm khuyến mãi !',
            'soluongkhuyenmai.numeric'=>'Số lượng sản phẩm khuyến mãi phải là số !',
            'soluongkhuyenmai.interger'=>'Số lượng sản phẩm khuyến mãi phải là số nguyên !',
            'dongiakhuyenmai.required'=>'Vui lòng nhập giá sản phẩm khuyến mãi !',
            'dongiakhuyenmai.numeric'=>'Giá nhập sản phẩm khuyến mãi phải là số !',
            'dongiakhuyenmai.interger'=>'Giá nhập sản phẩm khuyến mãi phải là số nguyên !',
            'dongiakhuyenmai.min'=>'Đơn sản phẩm khuyến mãi quá nhỏ !',
            'ngaybatdau.required'=>'Vui lòng nhập ngày bắt đầu !',
            'ngayketthuc.required'=>'Vui lòng nhập ngày kết thúc !',
        ]);
        $promote= new KhuyenMai;
        $promote->id = $request->id;
        $promote->MaSanPhamKhuyenMai = $request->masanphamkhuyenmai;
        $promote->MoTa = $request->mota;
        $promote->SoLuongKhuyenMai = $request->soluongkhuyenmai;
        $promote->DonGiaKhuyenMai = $request->dongiakhuyenmai;
        $promote->NgayBatDau = $request->ngaybatdau;
        $promote->NgayKetThuc = $request->ngayketthuc;
        $promote->save();
        return Redirect::route('promote.show',compact('promote'));
    }
    public function destroy($id){
        $promote = KhuyenMai::find($id);
        $promote ->delete();
        return Redirect::route('promote.index');
    }
}
