<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OCung;
use Illuminate\Support\Facades\Redirect;

class OCungController extends Controller
{
    public function index(){
        $oCung = OCung::all();
        return view('component.ocung.list_ocung',compact('oCung'));
    }
    public function show($id){
        $oCung = OCung::find($id);
        return view('component.ocung.show_ocung',compact('oCung'));
    }
    public function edit($id){
        $oCung = OCung::find($id);
        return view('component.ocung.edit_ocung',compact('oCung'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'tenocung'=>'required|max:50|min:2',
        ],[
            'tenocung.required' =>'Vui lòng nhập tên ổ cứng !',
            'tenocung.max' =>'Tên ổ cứng quá dài !',
            'tenocung.min' =>'Tên ổ cứng quá ngắn !',
        ]);
        $oCung = OCung::find($id);
        $oCung -> TenOCung = $request->get('tenocung');
        $oCung -> TrangThai = $request->get('trangthai');
        $oCung->save();
        return Redirect::route('oCung.show',compact('oCung'));
    }
    public function create(){
        $countAllocungs = OCung::all()->count() + 1;
        $finalId = $countAllocungs;
        return view('component.ocung.create_ocung',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        $request->validate([
            'tenocung'=>'required|unique:ocung|max:50|min:2',
        ],[
            'tenocung.required' =>'Vui lòng nhập tên ổ cứng !',
            'tenocung.unique' =>'Tên ổ cứng đã tồn tại !',
            'tenocung.max' =>'Tên ổ cứng quá dài !',
            'tenocung.min' =>'Tên ổ cứng quá ngắn !',
        ]);
        $oCung= new OCung;
        $oCung->id = $request->id;
        $oCung->TenOCung = $request->tenocung;
        $oCung->TrangThai = $request->trangthai;
        $oCung->save();
        return Redirect::route('oCung.index',['oCung'=>$oCung])->with('message', 'Màu sắc được tạo thành công với ID: ' . $oCung->id);
    }
}
