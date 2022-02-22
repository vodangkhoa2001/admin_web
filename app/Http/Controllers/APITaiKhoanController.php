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
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class APITaiKhoanController extends Controller
{



    public $successStatus = 200;
    public function register(Request $request)
    {
        function createID()
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
        $finalId = 'USERID' . $datetime . $originalId;
        return $finalId;
    }
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $user = TaiKhoan::create([
            'id'=> createID(),
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


    // public function login(Request $request){
    //     try{
    //         $username = TaiKhoan::where('TenDangNhap',$request->TenDangNhap)->first();
    //         if($request->MatKhau == $username->MatKhau){
    //             return response()->json(['status' => 'true',
    //             'data'=> $username->id,
    //             ], $this-> successStatus);
    //         }
    //         return response()->json([
    //                         'status' => 'false',
    //                         'data'=> '',
    //                     ], 401);
    //     }
    //     catch(Exception){
    //         return response()->json([
    //             'status' => 'false',
    //             'data'=> '',
    //         ], 401);
    //     }
    // }

    public function login(Request $request)
    {
       $user=TaiKhoan::where('Email',$request->Email)->first();
       if(!$user || !Hash::check($request->password, $user->MatKhau))
       {
          return response(['message'=>'Thông tin không trùng khớp.'],401);

       }

       $response=$user;
       return response($response,200);
       //return json_encode($response,200);
       //return $response;
       //return response()->json($response, 200);
    }

    public function info($id)
    {
        $user = TaiKhoan::find($id);
        return response()->json(['data' => $user], $this-> successStatus);
    }

    public function changePassword(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'MatKhau' => 'required',
            'MatKhauMoi' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $user = TaiKhoan::find($id);
        if($user->MatKhau == $request->MatKhau){
            $user->fill([
                'MatKhau' => Hash::make($request->MatKhauMoi)
            ])->save();
            return response()->json(['message'=>true],200);
        }else{
            return response()->json(['message'=>false], 401);
        }
    }
}
