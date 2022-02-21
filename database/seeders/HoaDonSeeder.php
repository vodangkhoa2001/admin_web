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
            array(
                'id'=>'HD01',
                'MaTaiKhoan'=>'USER01',
                'DiaChiGiaoHang'=>'hcm',
                'SDT_GiaoHang'=> '0909876789',
                'TongTien'=>40000000,
                'TrangThai_HoaDon'=>1,
            ),
            array(
                'id'=>1,
                'MaTaiKhoan'=>'USER01',
                'DiaChiGiaoHang'=>'hcm',
                'SDT_GiaoHang'=> '0909876789',
                'TongTien'=>20000000,
                'TrangThai_HoaDon'=>0,
            ),
        ]);
    }
}
