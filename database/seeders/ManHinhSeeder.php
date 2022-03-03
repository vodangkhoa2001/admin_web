<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ManHinh;

class ManHinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ManHinh = new ManHinh();
        $ManHinh->TenManHinh="11.6 inch";
        $ManHinh ->TrangThai = 1;
        $ManHinh->save();
        $ManHinh = new ManHinh();
        $ManHinh->TenManHinh="12.3 inch";
        $ManHinh ->TrangThai = 1;
        $ManHinh->save();
        $ManHinh = new ManHinh();
        $ManHinh->TenManHinh="12.4 inch";
        $ManHinh ->TrangThai = 1;
        $ManHinh->save();
        $ManHinh = new ManHinh();
        $ManHinh->TenManHinh="13.3 inch";
        $ManHinh ->TrangThai = 1;
        $ManHinh->save();
        $ManHinh = new ManHinh();
        $ManHinh->TenManHinh="13.4 inch";
        $ManHinh ->TrangThai = 1;
        $ManHinh->save();
        $ManHinh = new ManHinh();
        $ManHinh->TenManHinh="14 inch";
        $ManHinh ->TrangThai = 1;
        $ManHinh->save();
        $ManHinh = new ManHinh();
        $ManHinh->TenManHinh="15.6 inch";
        $ManHinh ->TrangThai = 1;
        $ManHinh->save();
        $ManHinh = new ManHinh();
        $ManHinh->TenManHinh="16 inch";
        $ManHinh ->TrangThai = 1;
        $ManHinh->save();
        $ManHinh = new ManHinh();
        $ManHinh->TenManHinh="16.1 inch";
        $ManHinh ->TrangThai = 1;
        $ManHinh->save();
        $ManHinh = new ManHinh();
        $ManHinh->TenManHinh="17 inch";
        $ManHinh ->TrangThai = 1;
        $ManHinh->save();
        $ManHinh = new ManHinh();
        $ManHinh->TenManHinh="17.3 inch";
        $ManHinh ->TrangThai = 1;
        $ManHinh->save();

    }
}
