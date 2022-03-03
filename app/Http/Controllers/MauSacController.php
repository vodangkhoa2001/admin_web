<?php

namespace App\Http\Controllers;

use App\Models\MauSac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MauSacController extends Controller
{
    public function index(){
        $lstMauSac = MauSac::all();
        return view('component.color.list_color',compact('lstMauSac'));
    }
    public function show($id){
        $lstMauSac = MauSac::find($id);
        return view('component.color.show_color',compact('lstMauSac'));
    }
    public function edit($id){
        $lstMauSac = MauSac::find($id);
        return view('component.color.edit_color',compact('lstMauSac'));
    }
    public function update(Request $request){
        $mauSac = MauSac::find($request->id);
        MauSac::where('id',$request->id)->update(
            [
                'id'=>$request->id,
                'TenMauSac'=>$request->tenmausac,
            ]
        );
        // $mauSac -> TenMau = $request-> TenMau;
        // $mauSac->save();
        return Redirect::route('show-color',compact('mauSac'));
    }
    public function create(){
        $countAllColors = MauSac::all()->count() + 1;
        $chuoiID = $countAllColors;
        if ($countAllColors > 99)
            $chuoiID = $$countAllColors;

        if ($countAllColors > 9)
            $chuoiID = '0' . $countAllColors;
        else
            $chuoiID = '00' . $countAllColors;

        $originalId = $chuoiID;
        $finalId = $originalId;
        //return view('component/product/create_product',['lstLoai'=>$lstLoai]);
        return view('component.color.create_color',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        $mauSac= new MauSac;
        $mauSac->id = $request->id;
        $mauSac->TenMau = $request->tenmausac;
        $mauSac->save();
        return Redirect::route('show-color',['mauSac'=>$mauSac])->with('message', 'Màu sắc được tạo thành công với ID: ' . $mauSac->id);
    }

}
