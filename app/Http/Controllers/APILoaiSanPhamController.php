<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DongSanPham;
class APILoaiSanPhamController extends Controller
{
    function getAllProductType(){
        $listProductType = DongSanPham::all();
        return json_encode([
            'success' => true,
            'data' => $listProductType
        ]);
    }
    function getProducTypeDetail($id){
        $detailProductType = DongSanPham::find($id);
        if(empty($detailProductType)){
            return json_encode([
                'success' => false,
                'message' => "Không tồn tại dòng sản phẩm {$id}"
            ]);
        }
        else{
            return json_encode([
                'success' => true,
                'data'    => $detailProductType
            ]);
        }
    }
    function create(Request $request){
        //  dd($request->ten_sp);
        $dongSanPham = new DongSanPham();
        if (empty($request->TenDongSanPham)){
            return json_encode([
                'success' => false,
                'message'  => 'Vui lòng nhập tên dòng sản phẩm'
            ]);
        }
        if (empty($request->TrangThai_DongSanPham)){
            return json_encode([
                'success' => false,
                'message'  => 'Vui lòng thêm trạng thái'
            ]);
        }
        $dongSanPham->TenDongSanPham = $request->TenDongSanPham;
        $dongSanPham->TrangThai_DongSanPham = $request->TrangThai_DongSanPham;
        $dongSanPham->save();
        return json_encode([
            'success' => true,
            'message' => "Tạo thành công sản phẩm {$dongSanPham->id}"
        ]);
    }
    public function update(Request $request,$id){
        $dongSanPham = DongSanPham::find($id);
        if($dongSanPham==null){
            return json_encode([
                'success' => false,
                'message' => 'Dòng sản phẩm không tồn tại'
            ]);
        }else{
            if(empty($request->TenDongSanPham)){
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui lòng nhập tên dòng sản phẩm'
                ]);
            }
            if (empty($request->TrangThai_DongSanPham)){
                return json_encode([
                    'success' => false,
                    'message'  => 'Vui lòng thiết lập trạng thái'
                ]);
            }
        }
        $dongSanPham->TenSanPham = $request->TenSanPham;
        $dongSanPham->TrangThai_DongSanPham = $request->TrangThai_DongSanPham;
        $dongSanPham->save();
        return json_encode([
            'success' => true,
            'message' => "Tạo thành công sản phẩm {$dongSanPham->id}"
        ]);
    }
    public function delete($id){
        $dongSanPham = DongSanPham:: find($id);
        if(empty($dongSanPham)){
            return json_encode([
                'success' => false,
                'message' => 'Không tìm thấy dòng sản phẩm'
            ]);
        }
        $dongSanPham ->delete();
        return json_encode([
            'success' => true,
            'message' => 'Xóa dòng sản phẩm thành công'
        ]);
    }

}

// <?php

// namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Models\Place;
// use App\Models\Like;
// use Carbon\Carbon;
// use Illuminate\Support\Str;
// use App\Models\PasswordReset;
// use App\Models\TaiKhoan;
// use App\Notifications\ResetPasswordRequest;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Hash;

// class APIToaiKhoanController extends Controller
// {
//     public $successStatus = 200;
//     public function register(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'username' => 'required',
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);
//         if ($validator->fails()) {
//             return response()->json(['error'=>$validator->errors()], 401);
//         }
//         $user = TaiKhoan::create([
//             'id'=> "user1",
//             'TenDangNhap' => $request->username,
//             'Email' => $request->email,
//             'MatKhau' => bcrypt($request->password),
//             'HoTen'=>$request->fullName,
//             'SDT'=>$request->SDT,
//             'DiaChi'=>$request->address,
//             'TrangThai_TaiKhoan' => 1,
//             'HinhAnh'=> $request->avatar,
//         ]);
//             return response()->json([
//                 'data'=>$user
//         ], $this-> successStatus);
//     }

//     // public function login(Request $request)
//     // {
//     //     try {
//     //         $login = $request->validate([
//     //             'TenDangNhap' => 'required|string',
//     //             'MatKhau' => 'required|string',
//     //         ]);

//     //         if(Auth::attempt($login)){
//     //             $user = Auth::user();
//     //             if($user->TrangThai_TaiKhoan == 1){
//     //                 return response()->json(['data' => $user], $this-> successStatus);
//     //             } else {
//     //                 return response()->json(['error'=>'Unauthorised'], 401);
//     //             }
//     //         }
//     //         else{
//     //             return response()->json(['error'=>'Unauthorised 2'], 401);
//     //         }
//     //     } catch (\Exception $e) {
//     //         return response()->json(['status' => 'error','message' => $e->getMessage(),'data'=>[]],500);
//     //     }
//     // }

//     public function info($id)
//     {
//         $user = TaiKhoan::find($id);
//         return response()->json(['data' => $user], $this-> successStatus);
//     }

// }

