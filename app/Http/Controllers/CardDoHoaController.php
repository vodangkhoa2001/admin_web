<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardDoHoa;
use Illuminate\Support\Facades\Redirect;

class CardDoHoaController extends Controller
{
    public function index(){
        $carddohoa = CardDoHoa::all();
        return view('component.carddohoa.list_carddohoa',compact('carddohoa'));
    }
    public function show($id){
        $carddohoa = CardDoHoa::find($id);
        return view('component.carddohoa.show_carddohoa',compact('carddohoa'));
    }
    public function edit($id){
        $carddohoa = CardDoHoa::find($id);
        return view('component.carddohoa.edit_carddohoa',compact('carddohoa'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'tencarddohoa'=>'required|max:50|min:2',
        ],[
            'tencarddohoa.required' =>'Vui lòng nhập tên Card đồ họa !',
            'tencarddohoa.max' =>'Tên Card đồ họa quá dài !',
            'tencarddohoa.min' =>'Tên Card đồ họa quá ngắn !',
        ]);
        $carddohoa = CardDoHoa::find($id);
        $carddohoa -> TenCardDoHoa = $request->get('tencarddohoa');
        $carddohoa -> TrangThai = $request->get('trangthai');
        $carddohoa->save();
        return Redirect::route('carddohoa.show',compact('carddohoa'));
    }
    public function create(){
        $countAllcarddohoas = CardDoHoa::all()->count() + 1;
        $finalId = $countAllcarddohoas;
        return view('component.carddohoa.create_carddohoa',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        $request->validate([
            'tencarddohoa'=>'required|unique:carddohoa|max:50|min:2',
        ],[
            'tencarddohoa.required' =>'Vui lòng nhập tên Card đồ họa !',
            'tencarddohoa.unique' =>'Tên Card đồ họa đã tồn tại !',
            'tencarddohoa.max' =>'Tên Card đồ họa quá dài !',
            'tencarddohoa.min' =>'Tên Card đồ họa quá ngắn !',
        ]);
        $carddohoa= new CardDoHoa;
        $carddohoa->id = $request->id;
        $carddohoa->TenCardDoHoa  = $request->tencarddohoa;
        $carddohoa->TrangThai = $request->trangthai;
        $carddohoa->save();
        return Redirect::route('carddohoa.index',['carddohoa'=>$carddohoa])->with('message', 'Màu sắc được tạo thành công với ID: ' . $carddohoa->id);
    }
}
