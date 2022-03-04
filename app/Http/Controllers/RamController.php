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
        $ram= new Ram;
        $ram->id = $request->id;
        $ram->TenRam = $request->tenram;
        $ram->TrangThai = $request->trangthai;
        $ram->save();
        return Redirect::route('ram.index',['ram'=>$ram])->with('message', 'RAM được tạo thành công với ID: ' . $ram->id);
    }
}
