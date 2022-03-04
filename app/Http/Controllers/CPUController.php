<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cpu;
use Illuminate\Support\Facades\Redirect;

class CPUController extends Controller
{
    public function index(){
        $cpu = Cpu::all();
        return view('component.cpu.list_cpu',compact('cpu'));
    }
    public function show($id){
        $cpu = Cpu::find($id);
        return view('component.cpu.show_cpu',compact('cpu'));
    }
    public function edit($id){
        $cpu = Cpu::find($id);
        return view('component.cpu.edit_cpu',compact('cpu'));
    }
    public function update(Request $request,$id){
        $cpu = Cpu::find($id);
        $cpu -> TenCPU = $request->get('tencpu');
        $cpu -> TrangThai = $request->get('trangthai');
        $cpu->save();
        return Redirect::route('cpu.show',compact('cpu'));
    }
    public function create(){
        $countAllcpus = Cpu::all()->count() + 1;
        $finalId = $countAllcpus;
        return view('component.cpu.create_cpu',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        $cpu= new Cpu;
        $cpu->id = $request->id;
        $cpu->TenCPU = $request->tencpu;
        $cpu->TrangThai = $request->trangthai;
        $cpu->save();
        return Redirect::route('cpu.index',['cpu'=>$cpu])->with('message', 'CPU được tạo thành công với ID: ' . $cpu->id);
    }
}
