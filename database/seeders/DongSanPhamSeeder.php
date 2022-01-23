<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DongSanPham;
class DongSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $DongSanPham=new DongSanPham();
        $DongSanPham->TenDongSanPham="Acer";
        $DongSanPham->TrangThai_DongSanPham=1;
        $DongSanPham->save();

        $DongSanPham=new DongSanPham();
        $DongSanPham->TenDongSanPham="MSI";
        $DongSanPham->TrangThai_DongSanPham=1;
        $DongSanPham->save();

        $DongSanPham=new DongSanPham();
        $DongSanPham->TenDongSanPham="Asus";
        $DongSanPham->TrangThai_DongSanPham=1;
        $DongSanPham->save();

    }
}
