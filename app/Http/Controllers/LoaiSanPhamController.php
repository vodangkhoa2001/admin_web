<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DongSanPham;
use Illuminate\Support\Facades\Redirect;
class LoaiSanPhamController extends Controller
{
    public function index(){
        $type = DongSanPham::all();
        return view('component.type.list_type',compact('type'));
    }
    public function show($id){
        $type = DongSanPham::find($id);
        return view('component.type.show_type',compact('type'));
    }
    public function edit($id){
        $type = DongSanPham::find($id);
        return view('component.type.edit_type',compact('type'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'tendongsanpham'=>'required|max:50|min:2',
        ],[
            'tendongsanpham.required' =>'Vui lòng nhập tên thương hiệu sản phẩm !',
            'tendongsanpham.max' =>'Tên thương hiệu quá dài !',
            'tendongsanpham.min' =>'Tên thương hiệu quá ngắn !',
        ]);
        $type = DongSanPham::find($id);
        $type -> TenDongSanPham = $request->get('tendongsanpham');
        $type -> TrangThai_DongSanPham = $request->get('trangthai');
        $type->save();
        return Redirect::route('type.show',compact('type'));
    }
    public function create(){
        $countAlltypes = DongSanPham::all()->count() + 1;
        $finalId = $countAlltypes;
        return view('component.type.create_type',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        $request->validate([
            'tendongsanpham'=>'required|unique:dongsanpham|max:50|min:2',
        ],[
            'tendongsanpham.required' =>'Vui lòng nhập tên thương hiệu sản phẩm !',
            'tendongsanpham.unique' =>'Tên thương hiệu đã tồn tại !',
            'tendongsanpham.max' =>'Tên thương hiệu quá dài !',
            'tendongsanpham.min' =>'Tên thương hiệu quá ngắn !',
        ]);
        $type= new DongSanPham;
        $type->id = $request->id;
        $type->TenDongSanPham = $request->tendongsanpham;
        $type->TrangThai_DongSanPham = $request->trangthai;
        $type->save();
        return Redirect::route('type.index',['type'=>$type])->with('message', 'Dòng sản phẩm được tạo thành công với ID: ' . $type->id);
    }
}
