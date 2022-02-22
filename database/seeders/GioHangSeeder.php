<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GioHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('giohang')->insert(
            [
                array(
                    "MaTaiKhoan"=>"ACCOUNTADMIN20220125070131003",
                    "MaSanPham" =>"SP01",
                    "SoLuong"=>"2"
                ),
                array(
                    "MaTaiKhoan"=>"ACCOUNTADMIN20220125070131003",
                    "MaSanPham" =>"SP02",
                    "SoLuong"=>"3"
                ),
            ]
        );
    }
}
