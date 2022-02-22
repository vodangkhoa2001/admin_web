<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class APITaiKhoanController extends Controller
{
    //
    public function login(Request $request)
    {
       $user=TaiKhoan::where('Email',$request->Email)->first();
       if(!$user || !Hash::check($request->password, $user->password))
       {
          return response(['message'=>'Thông tin không trùng khớp.'],401);
          
       }

       $response=$user;
       return response($response,200);
       //return json_encode($response,200);
       //return $response;
       //return response()->json($response, 200);
    }
    
}
