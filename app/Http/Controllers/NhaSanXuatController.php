<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaSanXuat;
use Illuminate\Support\Facades\Redirect;

class NhaSanXuatController extends Controller
{
    public function index(){
        $manufacturer = NhaSanXuat::paginate(5);
        return view('component.manufacturer.list_manufacturer',compact('manufacturer'));
    }
    public function show($id){
        $manufacturer = NhaSanXuat::find($id);
        return view('component.manufacturer.show_manufacturer',compact('manufacturer'));
    }
    public function edit($id){
        $manufacturer = NhaSanXuat::find($id);
        return view('component.manufacturer.edit_manufacturer',compact('manufacturer'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'tennhasanxuat'=>'required|max:70|min:2',
            'sdt'=>'required|numeric|min:10',
            'diachi' =>'required|',
            'email' =>'required|email',
            'fax' =>'required|',
        ],[
            'tennhasanxuat.required' =>'Vui lòng nhập tên nhà sản xuất !',
            'tennhasanxuat.max' =>'Tên nhà sản xuất quá dài !',
            'tennhasanxuat.min' =>'Tên nhà sản xuất quá ngắn !',
            'sdt.required' =>'Vui lòng nhập số điện thoại !',
            'sdt.min' =>'Vui lòng nhập đúng 10 số !',
            'sdt.numberic' =>'Số điện thoại phải là số !',
            'diachi.required' =>'Vui lòng nhập địa chỉ !',
            'email.required' =>'Vui lòng nhập Email !',
            'email.email' =>'Vui lòng nhập đúng định dạng Email !',
            'fax.required' =>'Vui lòng nhập fax !',
        ]);
        $manufacturer = NhaSanXuat::find($id);
        $manufacturer -> TenNhaSanXuat = $request->get('tennhasanxuat');
        $manufacturer -> SDT_NhaSanXuat = $request->get('sdt');
        $manufacturer -> DiaChiNhaSanXuat = $request->get('diachi');
        $manufacturer -> EmailNhaSanXuat = $request->get('email');
        $manufacturer -> Fax = $request->get('fax');
        $manufacturer -> TrangThai_NhaSanXuat = $request->get('trangthai');
        $manufacturer->save();
        return Redirect::route('manufacturer.show',compact('manufacturer'));
    }
    public function create(){
        $countAllmanufacturers = NhaSanXuat::all()->count() + 1;
        $finalId = $countAllmanufacturers;
        return view('component.manufacturer.create_manufacturer',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        $request->validate([
            'tennhasanxuat'=>'required|unique:nhasanxuat|max:70|min:2',
            'sdt'=>'required|numeric|min:10',
            'diachi' =>'required|',
            'email' =>'required|email',
            'fax' =>'required|',
        ],[
            'tennhasanxuat.required' =>'Vui lòng nhập tên nhà sản xuất !',
            'tennhasanxuat.unique' =>'Tên nhà sản xuất đã tồn tại !',
            'tennhasanxuat.max' =>'Tên nhà sản xuất quá dài !',
            'tennhasanxuat.min' =>'Tên nhà sản xuất quá ngắn !',
            'sdt.required' =>'Vui lòng nhập số điện thoại !',
            'sdt.min' =>'Vui lòng nhập đúng 10 số !',
            'sdt.numberic' =>'Số điện thoại phải là số !',
            'diachi.required' =>'Vui lòng nhập địa chỉ !',
            'email.required' =>'Vui lòng nhập Email !',
            'email.email' =>'Vui lòng nhập đúng định dạng Email !',
            'fax.required' =>'Vui lòng nhập fax !',
        ]);
        $manufacturer= new NhaSanXuat;
        $manufacturer->id = $request->id;
        $manufacturer->TenNhaSanXuat = $request->tennhasanxuat;
        $manufacturer -> SDT_NhaSanXuat = $request->sdt;
        $manufacturer -> DiaChiNhaSanXuat = $request->diachi;
        $manufacturer -> EmailNhaSanXuat = $request->email;
        $manufacturer -> Fax = $request->fax;
        $manufacturer->TrangThai_NhaSanXuat = $request->trangthai;
        $manufacturer->save();
        return Redirect::route('manufacturer.index',['manufacturer'=>$manufacturer])->with('message', 'Nhà sản xuất được tạo thành công với ID: ' . $manufacturer->id);
    }
    public function destroy($id){
        $promote = NhaSanXuat::find($id);
        $promote ->delete();
        return Redirect::route('manufacturer.index');
    }
}
