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
          return response(['message'=>'Thông tin không trùng khớp.'],401);

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

    public function changePassword(Request $request,$id){

        $user=TaiKhoan::where('id',$id,'password',$request->OldPassword)->first();
        if($request->OldPassword == $user -> password)
            // $user->password=$request->NewPassword;
        return response()->json(['data'=>$user->password
        ],200);
        // if($user->password == $request->OldPassword){
        //     $user->update([
        //         'password' => $request->NewPassword
        //     ]);
        //     return response()->json(['message'=>$user,
        //     'data'=>$user->password
        // ],200);
        // }else{
        //     return response()->json(['message'=>false], 401);
        // }
    }
}
