<?php

namespace App\Http\Controllers;


use App\Models\TaiKhoan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TaiKhoanController extends Controller
{
    public function getTaiKhoanAdmin()
    {
        $lstTaiKhoan=TaiKhoan::where('ID_LoaiTaiKhoan','2')->get();

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
        return back();
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
}
