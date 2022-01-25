<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class TaiKhoanController extends Controller
{
    public function getTaiKhoanAdmin()
    {
        //$lstTaiKhoan=TaiKhoan::where('ID_LoaiTaiKhoan','2')->get();

        $lstTaiKhoan = TaiKhoan::where('ID_LoaiTaiKhoan','2')->paginate(5);
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
            return redirect()->route('admin');
            //return view("component/index");
        }
        else
        {
            return 'đăng nhập thất bại';
        }
    }
    public function delete($id)
    {
        $account = Account::find($id)->delete();
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
        return redirect()->route('list-admin');
    }
}
