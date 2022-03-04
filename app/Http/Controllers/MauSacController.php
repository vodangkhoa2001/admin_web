<?php

namespace App\Http\Controllers;

use App\Models\MauSac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MauSacController extends Controller
{
    public function index(){
        $mauSac = MauSac::all();
        return view('component.color.list_color',compact('mauSac'));
    }
    public function show($id){
        $mauSac = MauSac::find($id);
        return view('component.color.show_color',compact('mauSac'));
    }
    public function edit($id){
        $mauSac = MauSac::find($id);
        return view('component.color.edit_color',compact('mauSac'));
    }
    public function update(Request $request,$id){
        $mauSac = MauSac::find($id);
        $mauSac -> TenMau = $request->get('tenmausac');
        $mauSac -> TrangThai = $request->get('trangthai');
        $mauSac->save();
        return Redirect::route('color.show',compact('mauSac'));
    }
    public function create(){
        $countAllColors = MauSac::all()->count() + 1;
        $finalId = $countAllColors;
        return view('component.color.create_color',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        $mauSac= new MauSac;
        $mauSac->id = $request->id;
        $mauSac->TenMau = $request->tenmausac;
        $mauSac->TrangThai = $request->trangthai;
        $mauSac->save();
        return Redirect::route('color.index',['mauSac'=>$mauSac])->with('message', 'Màu sắc được tạo thành công với ID: ' . $mauSac->id);
    }

}
