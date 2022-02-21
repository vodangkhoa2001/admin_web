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
                    "id"=>1,
                    "MaTaiKhoan"=>"USER01",
                    "MaSanPham" =>"SP01",
                    "SoLuong"=>"2"
                ),
                array(
                    "id"=>2,
                    "MaTaiKhoan"=>"USER01",
                    "MaSanPham" =>"SP02",
                    "SoLuong"=>"3"
                ),
            ]
        );
    }
}
