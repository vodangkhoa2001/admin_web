<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;

>>>>>>> test

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        //
        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="TAIKHOAN01";
        $TaiKhoan->TenDangNhap="huy556";
        $TaiKhoan->MatKhau= Hash::make("123456");
        $TaiKhoan->Email="huynguyen@gamil.com";
        $TaiKhoan->SDT="0123541485";
        $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        $TaiKhoan->HoTen="Nguyễn Văn A";
        $TaiKhoan->HinhAnh="user01.png";
        $TaiKhoan->ID_LoaiTaiKhoan=1;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();

        $TaiKhoan = new TaiKhoan();
        $TaiKhoan->id="TAIKHOAN02";
        $TaiKhoan->TenDangNhap="Khoa112";
        $TaiKhoan->MatKhau= Hash::make("123456");
        $TaiKhoan->Email="khoanguyen@gamil.com";
        $TaiKhoan->SDT="0123546485";
        $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        $TaiKhoan->HoTen="Nguyễn Văn Khoa";
        $TaiKhoan->HinhAnh="user1.png";
        $TaiKhoan->ID_LoaiTaiKhoan=1;
        $TaiKhoan->TrangThai_TaiKhoan=1;
        $TaiKhoan->save();
=======
        DB::table('taikhoan')->insert([
            'id'=>'USER01',
            'TenDangNhap'=>'vdk',
            'HoTen' => 'Dang Khoa',
            'Email' => 'vdk@gmail.com',
            'MatKhau' => Hash::make('password'),
            'SDT'=>'0909876789',
            'DiaChi'=>'hcm city',
            'HinhAnh'=>'user_01.png',
            'ID_LoaiTaiKhoan'=>1,
            'TrangThai_TaiKhoan'=>1,
        ]);

        //
        // $TaiKhoan = new TaiKhoan();
        // $TaiKhoan->id="TAIKHOAN01";
        // $TaiKhoan->TenDangNhap="huy556";
        // $TaiKhoan->MatKhau= Hash::make("123456");
        // $TaiKhoan->Email="huynguyen@gamil.com";
        // $TaiKhoan->SDT="0123541485";
        // $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        // $TaiKhoan->HoTen="Nguyễn Văn A";
        // $TaiKhoan->HinhAnh="user01.png";
        // $TaiKhoan->ID_LoaiTaiKhoan=1;
        // $TaiKhoan->TrangThai_TaiKhoan=1;
        // $TaiKhoan->save();

        // $TaiKhoan = new TaiKhoan();
        // $TaiKhoan->id="TAIKHOAN02";
        // $TaiKhoan->TenDangNhap="Khoa112";
        // $TaiKhoan->MatKhau= Hash::make("123456");
        // $TaiKhoan->Email="khoanguyen@gamil.com";
        // $TaiKhoan->SDT="0123546485";
        // $TaiKhoan->DiaChi="TP Hồ Chí Minh";
        // $TaiKhoan->HoTen="Nguyễn Văn Khoa";
        // $TaiKhoan->HinhAnh="user1.png";
        // $TaiKhoan->ID_LoaiTaiKhoan=1;
        // $TaiKhoan->TrangThai_TaiKhoan=1;
        // $TaiKhoan->save();

>>>>>>> test
    }
}
