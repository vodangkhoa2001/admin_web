<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hoadon')->insert([
            // array(
            //     'id'=>'HD01',
            //     'MaTaiKhoan'=>'ACCOUNTADMIN20220125010100006',
            //     'DiaChiGiaoHang'=>'hcm',
            //     'SDT_GiaoHang'=> '0909876789',
            //     'TongTien'=>40000000,
            //     'TrangThoai_HoaDon'=>4,
            // ),
            // array(
            //     'id'=>'HD02',
            //     'MaTaiKhoan'=>'ACCOUNTADMIN20220125010100006',
            //     'DiaChiGiaoHang'=>'hcm',
            //     'SDT_GiaoHang'=> '0909876789',
            //     'TongTien'=>40000000,
            //     'TrangThoai_HoaDon'=>1,
            // ),
            array(
                'id'=>'HD03',
                'MaTaiKhoan'=>'ACCOUNTADMIN20220125010100006',
                'DiaChiGiaoHang'=>'hcm',
                'SDT_GiaoHang'=> '0909876789',
                'TongTien'=>40000000,
                'TrangThoai_HoaDon'=>1,
            ),
            array(
                'id'=>'HD04',
                'MaTaiKhoan'=>'ACCOUNTADMIN20220125010100006',
                'DiaChiGiaoHang'=>'hcm',
                'SDT_GiaoHang'=> '0909876789',
                'TongTien'=>20000000,
                'TrangThoai_HoaDon'=>0,
            ),
            array(
                'id'=>'HD05',
                'MaTaiKhoan'=>'ACCOUNTADMIN20220125010100006',
                'DiaChiGiaoHang'=>'hcm',
                'SDT_GiaoHang'=> '0909876789',
                'TongTien'=>20000000,
                'TrangThoai_HoaDon'=>3,
            ),
            array(
                'id'=>'HD06',
                'MaTaiKhoan'=>'ACCOUNTADMIN20220125010100006',
                'DiaChiGiaoHang'=>'hcm',
                'SDT_GiaoHang'=> '0909876789',
                'TongTien'=>20000000,
                'TrangThoai_HoaDon'=>2,
            ),
        ]);
    }
}
