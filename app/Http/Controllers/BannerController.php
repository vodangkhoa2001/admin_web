<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index(){
        $banner = Banner::all();
        return view('component.banner.list_banner',compact('banner'));
    }
    public function show($id){
        $banner = Banner::find($id);
        return view('component.banner.show_banner',compact('banner'));
    }
    public function edit($id){
        $banner = Banner::find($id);
        return view('component.banner.edit_banner',compact('banner','banner'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'tenbanner'=>['required','min:2,max:100'],
            'mota'=>['required','max:255'],
            'hinhanh'=>['mimetypes:image/*','max:2000'],
        ],[
            'tenbanner.required'=>'Vui lòng nhập tên băng ron !',
            'tenbanner.min'=>'Tên băng ron quá ngắn !',
            'tenbanner.max'=>'Tên băng ron quá dài !',
            'mota.required'=>'Vui lòng nhập mô tả băng ron !',
            'mota.max'=>'Mô tả băng ron quá dài !',
            'hinhanh.max.'=>'Kích thước ảnh băng ron quá 2mb !',
        ]);
        $banner = Banner::find($id);
        if($request->hasFile('hinhanh')){
            $newImg = $request->file('hinhanh')->getClientOriginalName();
            $request->hinhanh->storeAs('images/product', $newImg);
            $banner->HinhAnh = $newImg;
        }
        $banner->TenBanner=$request->get('tenbanner');
        $banner->MoTa=$request->get('mota');
        $banner->TrangThai=$request->get('trangthai');
        $banner->save();
        return Redirect::route('banner.show',compact('banner'));
    }
    public function create(){
        $countAllbanners = Banner::all()->count() + 1;
        $finalId = $countAllbanners;
        return view('component.banner.create_banner',['finalId'=> $finalId]);
    }
    public function store(Request $request){
        $request->validate([
            'tenbanner'=>['required','min:2,max:100'],
            'mota'=>['required','max:255'],
            'hinhanh'=>['required','mimetypes:image/*','max:2000'],
        ],[
            'tenbanner.required'=>'Vui lòng nhập tên băng ron !',
            'tenbanner.min'=>'Tên băng ron quá ngắn !',
            'tenbanner.max'=>'Tên băng ron quá dài !',
            'mota.required'=>'Vui lòng nhập mô tả băng ron !',
            'mota.max'=>'Mô tả băng ron quá dài !',
            'hinhanh.required'=>'Vui lòng chọn ảnh băng ron !',
            'hinhanh.max.'=>'Kích thước ảnh băng ron quá 2mb !',
        ]);
        $banner= new Banner;
        $banner->id = $request->id;
        $banner->TenBanner=$request->get('tenbanner');
        $banner->MoTa=$request->get('mota');
        $banner->HinhAnh=$request->get('hinhanh');
        $banner->TrangThai=$request->get('trangthai');
        $nameImg = $request->file('hinhanh')->getClientOriginalName();
        $request->hinhanh->storeAs('images/banner', $nameImg);
        $banner->HinhAnh = $nameImg;
        $banner->save();
        return Redirect::route('banner.show',compact('banner'));
    }
    public function destroy($id){
        $banner = Banner::find($id);
        $banner ->delete();
        return Redirect::route('banner.index');
    }
}
