<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MauSac;

class MauSacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $MauSac=new MauSac();
        $MauSac->TenMau="Trắng";
        $MauSac->save();
        $MauSac=new MauSac();
        $MauSac->TenMau="Đen";
        $MauSac->save();
        $MauSac=new MauSac();
        $MauSac->TenMau="Bạc";
        $MauSac->save();
        $MauSac=new MauSac();
        $MauSac->TenMau="Hồng";
        $MauSac->save();
        $MauSac=new MauSac();
        $MauSac->TenMau="Vàng";
        $MauSac->save();
    }
}
