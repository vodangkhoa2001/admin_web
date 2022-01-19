<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function signUp(Request $request){
        $user = new User();
        $user->email = $request->email;
        $user->password = $request->password;
        $user->ho = $request->lastName;
        $user->ten = $request->firstName;
        $user->thanh_pho = $request->city;
        $user->quan_huyen = $request->district;
        $user->phuong_xa = $request->commune;
        $user->dia_chi = $request->address;
        if($user->save()){
            return json_encode([
                'success'=> true,
                'message'=> "Đã thêm tài khoản id = {$user->id}"
            ]);
        }
        else{
            return json_encode([
                'success' => false,
                'message'=> "Không thể thêm tài khoản"
            ]);
        }
    }
    // thong tin user
    public function userInfo($id){
        $user = User::find($id);
        if(empty($user)){
            return json_encode([
                'success' => false,
                'message' => "Không tồn tại tài khoản với id là {$id}"
            ]);
        }else{
            return json_encode([
                'success' => true,
                'data' => $user
            ]);
        }
    }
}
