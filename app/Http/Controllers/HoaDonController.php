<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;
class HoaDonController extends Controller
{
   
    public function getHoaDon()
    {
        $lsthoadon = HoaDon::paginate(5);
        //$data['taikhoan']=TaiKhoan::where('ID_LoaiTaiKhoan','2')->paginate(2);
        //dd($lsthoadon);
        $hoaDonCount = HoaDon::get()->count();
        return view('component/bill/list_bill',compact('lsthoadon'));
    }

    public function getHoaDonHuy()
    {
        $lsthoadon = HoaDon::where('TrangThai_HoaDon','0')->paginate(4);
        //$data['taikhoan']=TaiKhoan::where('ID_LoaiTaiKhoan','2')->paginate(2);
        //dd($lsthoadon);
        $hoaDonCount = HoaDon::get()->count();
        return view('component/bill/list_bill_huy',compact('lsthoadon'));
     }
    public function getHoaDonChoXacNhan()
    {
        $lsthoadon = HoaDon::where('TrangThai_HoaDon','1')->paginate(4);
        //$data['taikhoan']=TaiKhoan::where('ID_LoaiTaiKhoan','2')->paginate(2);
        //dd($lsthoadon);
        $hoaDonCount = HoaDon::get()->count();
        return view('component/bill/list_bill_choxacnhan',compact('lsthoadon'));
    }
    public function getHoaDonChoVanChuyen()
    {
        $lsthoadon = HoaDon::where('TrangThai_HoaDon','2')->paginate(4);
        //$data['taikhoan']=TaiKhoan::where('ID_LoaiTaiKhoan','2')->paginate(2);
        //dd($lsthoadon);
        $hoaDonCount = HoaDon::get()->count();
        return view('component/bill/list_bill_chovanchuyen',compact('lsthoadon'));
    }
    public function getHoaDonDangVanChuyen()
    {
        $lsthoadon = HoaDon::where('TrangThai_HoaDon','3')->paginate(4);
        //$data['taikhoan']=TaiKhoan::where('ID_LoaiTaiKhoan','2')->paginate(2);
        //dd($lsthoadon);
        $hoaDonCount = HoaDon::get()->count();
        return view('component/bill/list_bill_dangvanchuyen',compact('lsthoadon'));
    }
    
    public function getHoaDonDaGiao()
    {
        $lsthoadon = HoaDon::where('TrangThai_HoaDon','4')->paginate(4);
        //$data['taikhoan']=TaiKhoan::where('ID_LoaiTaiKhoan','2')->paginate(2);
        //dd($lsthoadon);
        $hoaDonCount = HoaDon::get()->count();
        return view('component/bill/list_bill_dagiao',compact('lsthoadon'));
    }

    public function TrangThaiHoaDon(Request $request)
    {
       $hoadon=HoaDon::where('id',$request->id)->first();
       //dd($hoadon);
       if($hoadon->TrangThai_HoaDon==1)
       {
         $hoadon->TrangThai_HoaDon=2;
         $hoadon->update();
         return redirect()->route('list-HoaDonChoXacNhan')->with('success','Cập Nhật Thành Công');
       }
       if($hoadon->TrangThai_HoaDon==2)
       {
         $hoadon->TrangThai_HoaDon=3;
         $hoadon->update();
         return redirect()->route('list-HoaDonChoVanChuyen')->with('success','Cập Nhật Thành Công');
       }
       if($hoadon->TrangThai_HoaDon==3)
       {
         $hoadon->TrangThai_HoaDon=4;
         $hoadon->update();
         return redirect()->route('list-HoaDonDangVanChuyen')->with('success','Cập Nhật Thành Công');
       }
    //    if($hoadon->TrangThai_HoaDon==3)
    //    {
    //      $hoadon->TrangThai_HoaDon=4;
    //      $hoadon->update();
    //      return redirect()->route('list-HoaDonDangVanChuyen')->with('success','Cập Nhật Thành Công');
    //    }
       
       //$response=$user;
       //return response($response,200);

       //return json_encode($response,200);
       //return $response;
       //return response()->json($response, 200);
    }

    public function HuyHoaDon(Request $request)
    {
        $hoadon=HoaDon::where('id',$request->id)->first();
        {
            $hoadon->TrangThai_HoaDon=0;
            $hoadon->update();
            return back()->with('success','Hủy Thành Công');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
