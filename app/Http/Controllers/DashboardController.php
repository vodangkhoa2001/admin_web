<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use App\Models\SanPham;
use App\Models\HoaDon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $total = DB::select('select SUM(hoadon.TongTien) as tong from hoadon where hoadon.TrangThai_HoaDon=3');
        $accountCount = TaiKhoan::count();
        $productCount = SanPham::where('TrangThai','1')->count();
        $successfulOrderCount = HoaDon::where('TrangThai_HoaDon','4')->count();
        $cancelOrderCount = HoaDon::where('TrangThai_HoaDon','0')->count();
        //$total1 = (double)$total;
        //$total2 =  number_format((double)$total, 0, ',', '.');
        return view('index',compact('accountCount','productCount','successfulOrderCount','cancelOrderCount','total'));
    }
}
