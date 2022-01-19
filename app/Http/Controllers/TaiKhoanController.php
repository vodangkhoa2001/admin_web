<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
class TaiKhoanController extends Controller
{
    public function getTaiKhoan()
    {
        $lstTaiKhoan=TaiKhoan::where('ID_LoaiTaiKhoan','1')->get();
        return view('component/account/admin',compact('lstTaiKhoan'));
        //return json_encode($lstTaiKhoan);
    }
}
