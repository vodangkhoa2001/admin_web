<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class TaiKhoanController extends Controller
{
    public function getTaiKhoanAdmin()
    {
        //$lstTaiKhoan=TaiKhoan::where('ID_LoaiTaiKhoan','2')->get();

        $lstTaiKhoan = TaiKhoan::orderBy('id', 'desc')->where('ID_LoaiTaiKhoan','2')->paginate(4);
        //$data['taikhoan']=TaiKhoan::where('ID_LoaiTaiKhoan','2')->paginate(2);

        $accountCount = TaiKhoan::where('ID_LoaiTaiKhoan','2')->count();
        return view('component/account/admin',compact('lstTaiKhoan','accountCount'));
        //return json_encode($lstTaiKhoan);
    }

    public function login(Request $request)
    {
            if((Auth::attempt(['TenDangNhap' => $request->username, 'password' =>
            $request->password])))
            {
                #chỗ này của user
                $taikhoan=Auth::User();

                // session(['hinhanh' => $taikhoan->HinhAnh]);
                // session(['hoten' => $taikhoan->HoTen]);
                // session(['id' => $user->id]);
                // if ($taikhoan->loaitk == 1) {
                //     return redirect()->route('admin.dashboard');
                // } else {
                //     return redirect()->route('index');
                // }
                if(Auth::User()->ID_LoaiTaiKhoan==2||Auth::User()->ID_LoaiTaiKhoan==3)
                {
                Session::flash('success', 'Đăng Nhập thành công');
                return redirect()->route('admin');
                }
                else
                {
                    Session::flash('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
                    return redirect('login');
                }
                //return view("component/index");
            }
            else
            {
                    // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                    Session::flash('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
                    return redirect('login');
            }
    }
    #Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function delete($id)
    {
        $account = TaiKhoan::find($id)->delete();
        return back()->with('success','Xóa Tài Khoản Thành Công');
    }
    public function show($id)
    {
        $account = TaiKhoan::find($id);
        return view('component/account/edit_user',compact('account'));
    }

    public function editTaiKhoanUser(Request $request)
    {
        $account = TaiKhoan::find($request->id);
        $account->TenDangNhap=$request->TenDangNhap;
        $account->Email=$request->Email;
        $account->SDT=$request->SDT;
        $account->DiaChi=$request->DiaChi;
        $account->HoTen=$request->HoTen;
        if(!empty( $request->HinhAnh))
        {
            $nameImg = $request->file('HinhAnh')->getClientOriginalName();
            $account->HinhAnh = $nameImg;
            $request->HinhAnh->storeAs('admin/images', $nameImg);
        }
        $account->update();
        return redirect()->route('list-admin')->with('success', 'Cập Nhật thành công');
    }

    public function changePassword(Request $request)
    {
       $user=TaiKhoan::where('id',Auth::user()->id)->first();
       if(!Hash::check($request->MatKhauCu, $user->password))
       {
          return back() ->with ('error','Sai Mật khẩu.');
       }
       else
       {
           if($request->MatKhauMoi==$request->XacNhanMatKhau)
           {
         $user->password=Hash::make($request->MatKhauMoi);
         $user->update();
         return redirect()->route('admin')->with('success','Đổi Mật Khẩu Thành Công');
           }
         else
         {
            return back()->with('error','Mật khẩu mới không trùng nhau');
         }
       }
       //$response=$user;
       //return response($response,200);

       //return json_encode($response,200);
       //return $response;
       //return response()->json($response, 200);
    }

    public function create()
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
        $finalId = 'ACCOUNTADMIN' . $datetime . $originalId;
        return view('component/account/create_admin', compact('finalId'));
    }

    public function addAccount(Request $request)
    {
        //kiểm tra tên đăng nhập
        $TenDangNhap = TaiKhoan::where('TenDangNhap', $request->TenDangNhap)->first();
        if (empty($TenDangNhap)) {
        $account = new TaiKhoan();
        $account->id = $request->id;
        $account->TenDangNhap = $request->TenDangNhap;
        $account->password = Hash::make("123456");
        $account->Email = $request->Email;
        $account->SDT = $request->SDT;
        $account->DiaChi = $request->DiaChi;
        $account->HoTen = $request->HoTen;
        $nameImg = $request->file('HinhAnh')->getClientOriginalName();
        $account->HinhAnh = $nameImg;
        $request->HinhAnh->storeAs('admin/images', $nameImg);
        $account->ID_LoaiTaiKhoan = 2;
        $account->TrangThai_TaiKhoan =1;
        $account->save();
        return redirect()->route('list-admin')->with('success', 'Thêm thành công');
        }
        return back()->with('error', 'Tên đăng nhập đã đăng kí');
    }
    public function editTaiKhoan(Request $request)
    {
        $account = TaiKhoan::find(Auth::User()->id);
        $account->TenDangNhap=$request->TenDangNhap;
        $account->Email=$request->Email;
        $account->SDT=$request->SDT;
        $account->DiaChi=$request->DiaChi;
        $account->HoTen=$request->HoTen;
        if(!empty( $request->HinhAnh))
        {
            $nameImg = $request->file('HinhAnh')->getClientOriginalName();
            $account->HinhAnh = $nameImg;
            $request->HinhAnh->storeAs('admin/images', $nameImg);
        }
        $account->update();
        return redirect()->route('admin')->with('success', 'Cập Nhật thành công');
    }

    public function taoiduser()
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
        
        return json_encode($finalId,200);
        
    }

}
