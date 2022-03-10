<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KhuyenMai;

class KhuyenMaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $SanPham=new SanPham();
        $promote = new KhuyenMai();
        $promote->id = 1;
        $promote -> MaSanPhamKhuyenMai = "SP001";
        $promote -> DonGiaKhuyenMai = 500000;
        $promote -> SoLuongKhuyenMai = 5;
        $promote -> NgayBatDau = "2022-2-27";
        $promote -> NgayKetThuc = "2022-2-28";
        $promote -> MoTa = "Số lượng có hạn nhanh tay nào.";
        $promote -> save();

        $promote = new KhuyenMai();
        $promote->id = 2;
        $promote -> MaSanPhamKhuyenMai = "SP002";
        $promote -> DonGiaKhuyenMai = 1000000;
        $promote -> SoLuongKhuyenMai = 4;
        $promote -> NgayBatDau = "2022-2-27";
        $promote -> NgayKetThuc = "2022-3-1";
        $promote -> MoTa = "Số lượng có hạn nhanh tay nào.";
        $promote -> save();

        $promote = new KhuyenMai();
        $promote->id = 3;
        $promote -> MaSanPhamKhuyenMai = "SP003";
        $promote -> DonGiaKhuyenMai = 500000;
        $promote -> SoLuongKhuyenMai = 10;
        $promote -> NgayBatDau = "2022-2-27";
        $promote -> NgayKetThuc = "2022-3-8";
        $promote -> MoTa = "Số lượng có hạn nhanh tay nào.";
        $promote -> save();
    }
}
