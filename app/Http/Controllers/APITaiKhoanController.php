<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Place;
use App\Models\Like;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use App\Models\TaiKhoan;
use App\Notifications\ResetPasswordRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class APITaiKhoanController extends Controller
{


    public $successStatus = 200;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $user = TaiKhoan::create([
            'id'=> "user01",
            'TenDangNhap' => $request->username,
            'Email' => $request->email,
            'MatKhau' => bcrypt($request->password),
            'HoTen'=>$request->fullName,
            'SDT'=>$request->SDT,
            'DiaChi'=>$request->address,
            'TrangThai_TaiKhoan' => 1,
            'HinhAnh'=> $request->avatar,
        ]);
            return response()->json([
                'data'=>$user
        ], $this-> successStatus);
    }

    // public function login(Request $request)
    // {
    //     try {
    //         $login = $request->validate([
    //             'TenDangNhap' => 'required|string',
    //             'MatKhau' => 'required|string',
    //         ]);

    //         if(Auth::attempt($login)){
    //             $user = Auth::user();
    //             if($user->TrangThai_TaiKhoan == 1){
    //                 return response()->json(['data' => $user], $this-> successStatus);
    //             } else {
    //                 return response()->json(['error'=>'Unauthorised'], 401);
    //             }
    //         }
    //         else{
    //             return response()->json(['error'=>'Unauthorised 2'], 401);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error','message' => $e->getMessage(),'data'=>[]],500);
    //     }
    // }

    public function info($id)
    {
        $user = TaiKhoan::find($id);
        return response()->json(['data' => $user], $this-> successStatus);
    }

}
