<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NhaSanXuat;
class NhaSanXuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $NhaSanXuat=new NhaSanXuat();
        $NhaSanXuat->TenNhaSanXUat="AsusTek Computer Inc";
        $NhaSanXuat->SDT_NhaSanXuat="02163451231";
        $NhaSanXuat->DiaChiNhaSanXuat="TP Hồ Chí Minh";
        $NhaSanXuat->EmailNhaSanXuat="Asus@gmail.com";
        $NhaSanXuat->Fax="Asus@fax.com";
        $NhaSanXuat->TrangThai_NhaSanXuat=1;
        $NhaSanXuat->save();

        $NhaSanXuat=new NhaSanXuat();
        $NhaSanXuat->TenNhaSanXUat="Micro-Star International";
        $NhaSanXuat->SDT_NhaSanXuat="02452541231";
        $NhaSanXuat->DiaChiNhaSanXuat="TP Hồ Chí Minh";
        $NhaSanXuat->EmailNhaSanXuat="MSI@gmail.com";
        $NhaSanXuat->Fax="MSI@fax.com";
        $NhaSanXuat->TrangThai_NhaSanXuat=1;
        $NhaSanXuat->save();

        $NhaSanXuat=new NhaSanXuat();
        $NhaSanXuat->TenNhaSanXUat="Acer Inc";
        $NhaSanXuat->SDT_NhaSanXuat="0651654515";
        $NhaSanXuat->DiaChiNhaSanXuat="TP Hồ Chí Minh";
        $NhaSanXuat->EmailNhaSanXuat="Acer@gmail.com";
        $NhaSanXuat->Fax="Acer@fax.com";
        $NhaSanXuat->TrangThai_NhaSanXuat=1;
        $NhaSanXuat->save();
    }
}
