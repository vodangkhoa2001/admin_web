<?php

namespace Database\Seeders;
use App\Http\Requests;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\TaiKhoan;
class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('taikhoan')->insert([
        //     array(
        //         'id'=>'USER01',
        //         'TenDangNhap'=>'vdk',
        //         'HoTen' => 'Nguyễn Quang Huy',
        //         'Email' => 'vdk@gmail.com',
        //         'MatKhau' => Hash::make('123456789'),
        //         'SDT'=>'0909876789',
        //         'DiaChi'=>'hcm city',
        //         'HinhAnh'=>'user_01.png',
        //         'ID_LoaiTaiKhoan'=>1,
        //         'TrangThai_TaiKhoan'=>1,
        //     ),
        //     array(
        //         'id'=>'USER02',
        //         'TenDangNhap'=>'huy',
        //         'HoTen' => 'Huy',
        //         'Email' => 'huy@gmail.com',
        //         'MatKhau' => Hash::make('123456789'),
        //         'SDT'=>'0909765675',
        //         'DiaChi'=>'hcm city',
        //         'HinhAnh'=>'user_02.png',
        //         'ID_LoaiTaiKhoan'=>1,
        //         'TrangThai_TaiKhoan'=>1,
        //     )
        // ]);

        //user
        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="TAIKHOAN01";
        $TaiKhoan->TenDangNhap=null;
        $TaiKhoan->password= Hash::make("123456");
        $TaiKhoan->Email="huynguyen@gmail.com";
        $TaiKhoan->SDT="0123541485";
        $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        $TaiKhoan->HoTen="Nguyễn Văn A";
        $TaiKhoan->HinhAnh="user01.png";
        $TaiKhoan->ID_LoaiTaiKhoan=1;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();

        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="TAIKHOAN02";
        $TaiKhoan->TenDangNhap=null;
        $TaiKhoan->password= Hash::make("123456");
        $TaiKhoan->Email="khoanguyen@gmail.com";
        $TaiKhoan->SDT="0123546485";
        $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        $TaiKhoan->HoTen="Nguyễn Văn Khoa";
        $TaiKhoan->HinhAnh="user01.png";
        $TaiKhoan->ID_LoaiTaiKhoan=1;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();

//admin
        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="ACCOUNTADMIN20221225010100006";
        $TaiKhoan->TenDangNhap="admin";
        $TaiKhoan->password= Hash::make("admin");
        $TaiKhoan->Email="nguyenhuy@gmail.com";
        $TaiKhoan->SDT="0798745451";
        $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        $TaiKhoan->HoTen="Nguyễn Huy";
        $TaiKhoan->HinhAnh="Screenshot 2021-07-13 163656.png";
        $TaiKhoan->ID_LoaiTaiKhoan=3;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();


        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="ACCOUNTADMIN20220125010100006";
        $TaiKhoan->TenDangNhap="huy123";
        $TaiKhoan->password= Hash::make("123456");
        $TaiKhoan->Email="nguyenhuylun1402@gmail.com";
        $TaiKhoan->SDT="0123545134";
        $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        $TaiKhoan->HoTen="Nguyễn Quang Huy";
        $TaiKhoan->HinhAnh="199003863_1119229888563240_5515520791173048802_n.jpg";
        $TaiKhoan->ID_LoaiTaiKhoan=2;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();


        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="ACCOUNTADMIN20220125010131007";
        $TaiKhoan->TenDangNhap="dangkhoa123";
        $TaiKhoan->password= Hash::make("123456");
        $TaiKhoan->Email="0306191484@caothang.edu.vn";
        $TaiKhoan->SDT="0232151561";
        $TaiKhoan->DiaChi="Hà Nội";
        $TaiKhoan->HoTen="Võ Đăng Khoa";
        $TaiKhoan->HinhAnh="201482559_1119229865229909_6707411958204350471_n.jpg";
        $TaiKhoan->ID_LoaiTaiKhoan=2;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();

        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="ACCOUNTADMIN20220125020140008";
        $TaiKhoan->TenDangNhap="dangkhoa321";
        $TaiKhoan->password= Hash::make("123456");
        $TaiKhoan->Email="03061852124@caothang.edu.vn";
        $TaiKhoan->SDT="0295251561";
        $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        $TaiKhoan->HoTen="Võ Đăng Minh Khoa";
        $TaiKhoan->HinhAnh="download20210901222009.png";
        $TaiKhoan->ID_LoaiTaiKhoan=2;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();

        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="ACCOUNTADMIN20220125070131003";
        $TaiKhoan->TenDangNhap="huyne321";
        $TaiKhoan->password= Hash::make("123456");
        $TaiKhoan->Email="0306151234@caothang.edu.vn";
        $TaiKhoan->SDT="0798953499";
        $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        $TaiKhoan->HoTen="Nguyễn Minh Hoàng Huy";
        $TaiKhoan->HinhAnh="120628.png";
        $TaiKhoan->ID_LoaiTaiKhoan=2;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();

        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="ACCOUNTADMIN20220125100111004";
        $TaiKhoan->TenDangNhap="khoa213";
        $TaiKhoan->password= Hash::make("123456");
        $TaiKhoan->Email="khongsaodau178@gmail.com";
        $TaiKhoan->SDT="0232151561";
        $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        $TaiKhoan->HoTen="Võ Quang Khoa";
        $TaiKhoan->HinhAnh="201482559_1119229865229909_6707411958204350471_n.jpg";
        $TaiKhoan->ID_LoaiTaiKhoan=2;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();

        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="ACCOUNTADMIN20220125120143005";
        $TaiKhoan->TenDangNhap="dangkhoa123456";
        $TaiKhoan->password= Hash::make("123456");
        $TaiKhoan->Email="nguyenhuylun1404@gmail.com";
        $TaiKhoan->SDT="0232151561";
        $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        $TaiKhoan->HoTen="Nguyễn Đăng Khoa";
        $TaiKhoan->HinhAnh="5f75e6a319024caf144aab17cccefb29.jpg";
        $TaiKhoan->ID_LoaiTaiKhoan=2;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();

        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="ACCOUNTADMIN20220126120133009";
        $TaiKhoan->TenDangNhap="alo123";
        $TaiKhoan->password= Hash::make("123456");
        $TaiKhoan->Email="030696574@caothang.edu.vn";
        $TaiKhoan->SDT="0232159651";
        $TaiKhoan->DiaChi="Hà Nội";
        $TaiKhoan->HoTen="Trần Hiếu Khoa";
        $TaiKhoan->HinhAnh="b142131-tPOm5OKo9Yof.jpg";
        $TaiKhoan->ID_LoaiTaiKhoan=2;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();

        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="ACCOUNTADMIN20220211060217011";
        $TaiKhoan->TenDangNhap="laravel";
        $TaiKhoan->password= Hash::make("123456");
        $TaiKhoan->Email="laravel@caothang.edu.vn";
        $TaiKhoan->SDT="0232954121";
        $TaiKhoan->DiaChi="Hà Nội";
        $TaiKhoan->HoTen="Võ Minh Hiếu";
        $TaiKhoan->HinhAnh="1624203099454.jpg";
        $TaiKhoan->ID_LoaiTaiKhoan=2;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();
    }
}
