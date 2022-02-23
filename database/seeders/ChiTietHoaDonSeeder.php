<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ChiTietHoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chitiethoadon')->insert([
            array(
                'id'=>1,
                'MaHoaDon'=>'HD04',
                'MaSanPham'=>'SP01',
                'SoLuong'=> 2,
                'DonGia'=>21000000,
                'DonGiaKhuyenMai'=> 2000000,
                'TrangThai_ChiTietHoaDon'=>1,
            ),
            array(
                'id'=>2,
                'MaHoaDon'=>'HD05',
                'MaSanPham'=>'SP03',
                'SoLuong'=> 2,
                'DonGia'=>21000000,
                'DonGiaKhuyenMai'=> 2000000,
                'TrangThai_ChiTietHoaDon'=>1,
            ),
            array(
                'id'=>3,
                'MaHoaDon'=>'HD06',
                'MaSanPham'=>'SP03',
                'SoLuong'=> 2,
                'DonGia'=>21000000,
                'DonGiaKhuyenMai'=> 2000000,
                'TrangThai_ChiTietHoaDon'=>1,
            ),
            array(
                'id'=>4,
                'MaHoaDon'=>'HD04',
                'MaSanPham'=>'SP01',
                'SoLuong'=> 2,
                'DonGia'=>21000000,
                'DonGiaKhuyenMai'=> 2000000,
                'TrangThai_ChiTietHoaDon'=>1,
            ),
            array(
                'id'=>5,
                'MaHoaDon'=>'HD04',
                'MaSanPham'=>'SP02',
                'SoLuong'=> 2,
                'DonGia'=>21000000,
                'DonGiaKhuyenMai'=> 2000000,
                'TrangThai_ChiTietHoaDon'=>1,
            ),
            array(
                'id'=>6,
                'MaHoaDon'=>'HD05',
                'MaSanPham'=>'SP02',
                'SoLuong'=> 1,
                'DonGia'=>21000000,
                'DonGiaKhuyenMai'=> 2000000,
                'TrangThai_ChiTietHoaDon'=>1,
            ),

        ]);
    }
}
