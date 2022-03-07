<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ram;
use Illuminate\Support\Facades\Redirect;

class RamController extends Controller
{
    public function index(){
        $ram = Ram::all();
        return view('component.ram.list_ram',compact('ram'));
    }
    public function show($id){
        $ram = Ram::find($id);
        return view('component.ram.show_ram',compact('ram'));
    }
    public function edit($id){
        $ram = Ram::find($id);
        return view('component.ram.edit_ram',compact('ram'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'tenram'=>'required|max:50|min:2',
        ],[
            'tenram.required' =>'Vui lòng nhập tên RAM !',
            'tenram.max' =>'Tên RAM quá dài !',
            'tenram.min' =>'Tên RAM quá ngắn !',
        ]);
        $ram = Ram::find($id);
        $ram -> TenRam = $request->get('tenram');
        $ram -> TrangThai = $request->get('trangthai');
        $ram->save();
        return Redirect::route('ram.show',compact('ram'));
    }
    public function create(){
        $countAllrams = Ram::all()->count() + 1;
        $finalId = $countAllrams;
        return view('component.ram.create_ram',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        $request->validate([
            'tenram'=>'required|unique:ram|max:50|min:2',
        ],[
            'tenram.required' =>'Vui lòng nhập tên RAM !',
            'tenram.unique' =>'Tên RAM đã tồn tại !',
            'tenram.max' =>'Tên RAM quá dài !',
            'tenram.min' =>'Tên RAM quá ngắn !',
        ]);
        $ram= new Ram;
        $ram->id = $request->id;
        $ram->TenRam = $request->tenram;
        $ram->TrangThai = $request->trangthai;
        $ram->save();
        return Redirect::route('ram.index',['ram'=>$ram])->with('message', 'RAM được tạo thành công với ID: ' . $ram->id);
    }
}
