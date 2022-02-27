<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class APITaiKhoanController extends Controller
{
    //
    public function login(Request $request)
    {
       $user=TaiKhoan::where('Email',$request->Email)->first();
       if(!$user || !Hash::check($request->Password, $user->password))
       {
          return response(['mess'=>'false'],401);
       }
       $response=$user;
       return response(['mess'=>'true',$response->id],200);
       //return json_encode($response,200);
       //return $response;
       //return response()->json($response, 200);
    }

    public function info($id)
    {
        $user = TaiKhoan::find($id);
        return response()->json(['data' => $user],200);
    }
    public function changePassword(Request $request)
    {
       $user=TaiKhoan::where('Email',$request->Email)->first();
       if(!Hash::check($request->OldPassword, $user->password))
       {
          return response(['message'=>'Thông tin không trùng khớp.'],401);
       }
       else
       {
         $user->password=Hash::make($request->NewPassword);
         $user->update();
         return response(['message'=>'Đã đổi thành công.'],200);
       }
       //$response=$user;
       //return response($response,200);

       //return json_encode($response,200);
       //return $response;
       //return response()->json($response, 200);
    }
    public function SignUp(Request $request)
    {
        $datetime = Date('Ymdhms');
        $countAllAccount = TaiKhoan::all()->count() + 1;
        $chuoiID = $countAllAccount;
        if ($countAllAccount > 99)
            $chuoiID = $countAllAccount;

        if ($countAllAccount > 9)
            $chuoiID = '0' . $countAllAccount;
        else
            $chuoiID = '00' . $countAllAccount;

        $originalId = $chuoiID;
        $finalId = 'ACCOUNTUSER' . $datetime . $originalId;
        //kiểm tra tên đăng nhập
        $Email = TaiKhoan::where('Email', $request->Email)->first();
        if (empty($Email)) {
        $account = new TaiKhoan();
        $account->id = $finalId;
        $account->TenDangNhap = null;
        $account->password = Hash::make($request->Password);
        $account->Email = $request->Email;
        $account->SDT = $request->SDT;
        $account->DiaChi = $request->DiaChi;
        $account->HoTen = $request->HoTen;
        $account->HinhAnh = "user01.jpg";
        $account->ID_LoaiTaiKhoan = 1;
        $account->TrangThai_TaiKhoan =1;
        $account->save();
        return response(['message'=>'Đã Đăng kí thành công.'],200);
        }
        else
        {
         return response(['message'=>'Đăng kí không thành công'],401);
        }
    }

}
