<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
class TaiKhoanController extends Controller
{
    public function getTaiKhoan()
    {
        $lstTaiKhoan=TaiKhoan::where('ID_LoaiTaiKhoan','1')->get();
        return view('component/account/admin',compact('lstTaiKhoan'));
        //return json_encode($lstTaiKhoan);
    }

    public function login(Request $request)
    {
        if((Auth::attempt(['TenDangNhap' => $request->username, 'password' =>
        $request->password])))
        {
            return redirect()->route('admin');
            //return view("component/index");
        }
        else
        {
            return 'đăng nhập thất bại';
        }
    }
}
