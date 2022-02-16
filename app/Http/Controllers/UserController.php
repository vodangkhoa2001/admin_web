<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TaiKhoan;

class UserController extends Controller
{
    public function getTaiKhoanUser(){
        $lstTaiKhoan = TaiKhoan::orderBy('id', 'desc')->where('ID_LoaiTaiKhoan','1')->paginate(5);
        //$data['taikhoan']=TaiKhoan::where('ID_LoaiTaiKhoan','2')->paginate(2);

        $accountCount = TaiKhoan::where('ID_LoaiTaiKhoan','1')->count();
        return view('component/account/user',compact('lstTaiKhoan','accountCount'));
        //return json_encode($lstTaiKhoan);
    }






    // public function signUp(Request $request){
    //     $user = new User();
    //     $user->email = $request->email;
    //     $user->password = $request->password;
    //     $user->ho = $request->lastName;
    //     $user->ten = $request->firstName;
    //     $user->thanh_pho = $request->city;
    //     $user->quan_huyen = $request->district;
    //     $user->phuong_xa = $request->commune;
    //     $user->dia_chi = $request->address;
    //     if($user->save()){
    //         return json_encode([
    //             'success'=> true,
    //             'message'=> "Đã thêm tài khoản id = {$user->id}"
    //         ]);
    //     }
    //     else{
    //         return json_encode([
    //             'success' => false,
    //             'message'=> "Không thể thêm tài khoản"
    //         ]);
    //     }
    // }
    // // thong tin user
    // public function userInfo($id){
    //     $user = User::find($id);
    //     if(empty($user)){
    //         return json_encode([
    //             'success' => false,
    //             'message' => "Không tồn tại tài khoản với id là {$id}"
    //         ]);
    //     }else{
    //         return json_encode([
    //             'success' => true,
    //             'data' => $user
    //         ]);
    //     }
    // }
}
