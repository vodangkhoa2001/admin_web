<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManHinh;
use Illuminate\Support\Facades\Redirect;

class MonitorController extends Controller
{
    public function index(){
        $monitor = ManHinh::all();
        return view('component.monitor.list_monitor',compact('monitor'));
    }
    public function show($id){
        $monitor = ManHinh::find($id);
        return view('component.monitor.show_monitor',compact('monitor'));
    }
    public function edit($id){
        $monitor = ManHinh::find($id);
        return view('component.monitor.edit_monitor',compact('monitor'));
    }
    public function update(Request $request,$id){
        $monitor = ManHinh::find($id);
        $monitor -> TenManHinh = $request->get('tenmanhinh');
        $monitor -> TrangThai = $request->get('trangthai');
        $monitor->save();
        return Redirect::route('monitor.show',compact('monitor'));
    }
    public function create(){
        $countAllmonitors = ManHinh::all()->count() + 1;
        $finalId = $countAllmonitors;
        return view('component.monitor.create_monitor',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        $monitor= new ManHinh;
        $monitor->id = $request->id;
        $monitor->TenManHinh = $request->tenmanhinh;
        $monitor->TrangThai = $request->trangthai;
        $monitor->save();
        return Redirect::route('monitor.index',['monitor'=>$monitor])->with('message', 'Màn hình được tạo thành công với ID: ' . $monitor->id);
    }
}
