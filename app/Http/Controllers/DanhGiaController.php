<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhGia;
use Illuminate\Support\Facades\Redirect;
use App\Models\SanPham;
use App\Models\TaiKhoan;

class DanhGiaController extends Controller
{
    public function index(){
        $rate = DanhGia::paginate(5);
        return view('component.rate.list_rate',compact('rate'));
    }
    public function show($id){
        $rate = DanhGia::find($id);
        return view('component.rate.show_rate',compact('rate'));
    }
    public function edit($id){
        $rate = DanhGia::find($id);
        $sanPham = SanPham::all();
        $taiKhoan = TaiKhoan::all();
        return view('component.rate.edit_rate',compact('rate','taiKhoan','sanPham'));
    }
    public function update(Request $request,$id){
        $rate = DanhGia::find($id);
        $rate->TraLoi = $request->get('traloidanhgia');
        $rate -> TrangThai = $request->get('trangthai');
        $rate->save();
        return Redirect::route('rate.show',compact('rate'));
    }
    public function create($id){
        $rate = DanhGia::find($id);
        $sanPham = SanPham::all();
        $taiKhoan = TaiKhoan::all();
        return view('component.rate.response_rate',compact('rate','taiKhoan','sanPham'));
    }
    public function response($id){
        $rate = DanhGia::find($id);
        $sanPham = SanPham::all();
        $taiKhoan = TaiKhoan::all();
        return view('component.rate.response_rate',compact('rate','taiKhoan','sanPham'));
    }
    public function store(Request $request,$id){
        $rate = DanhGia::find($id);
        $rate->TraLoi = $request->get('traloidanhgia');
        $rate->save();
        return Redirect::route('rate.index',compact('rate'));
    }
}
