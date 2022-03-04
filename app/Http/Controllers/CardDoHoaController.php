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
        $carddohoa= new CardDoHoa;
        $carddohoa->id = $request->id;
        $carddohoa->TenCardDoHoa  = $request->tencarddohoa;
        $carddohoa->TrangThai = $request->trangthai;
        $carddohoa->save();
        return Redirect::route('carddohoa.index',['carddohoa'=>$carddohoa])->with('message', 'Màu sắc được tạo thành công với ID: ' . $carddohoa->id);
    }
}
