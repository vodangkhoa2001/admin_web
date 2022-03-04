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
        $oCung = OCung::find($id);
        $oCung -> TenOCung = $request->get('tenocung');
        $oCung -> TrangThai = $request->get('trangthai');
        $oCung->save();
        return Redirect::route('ocung.show',compact('oCung'));
    }
    public function create(){
        $countAllocungs = OCung::all()->count() + 1;
        $finalId = $countAllocungs;
        return view('component.ocung.create_ocung',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        $oCung= new OCung;
        $oCung->id = $request->id;
        $oCung->TenOCung = $request->tenocung;
        $oCung->TrangThai = $request->trangthai;
        $oCung->save();
        return Redirect::route('ocung.index',['oCung'=>$oCung])->with('message', 'Màu sắc được tạo thành công với ID: ' . $oCung->id);
    }
}
