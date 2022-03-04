<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaSanXuat;
use Illuminate\Support\Facades\Redirect;

class NhaSanXuatController extends Controller
{
    public function index(){
        $manufacturer = NhaSanXuat::all();
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
        $manufacturer = NhaSanXuat::find($id);
        $manufacturer -> TenNhaSanXuat = $request->get('tennhasanxuat');
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
        $manufacturer= new NhaSanXuat;
        $manufacturer->id = $request->id;
        $manufacturer->TenNhaSanXuat = $request->tennhasanxuat;
        $manufacturer->TrangThai_NhaSanXuat = $request->trangthai;
        $manufacturer->save();
        return Redirect::route('manufacturer.index',['manufacturer'=>$manufacturer])->with('message', 'Nhà sản xuất được tạo thành công với ID: ' . $manufacturer->id);
    }
}
