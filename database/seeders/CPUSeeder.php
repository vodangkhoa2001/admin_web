<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cpu;

class CPUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CPU = new Cpu();
        $CPU ->TenCPU = "Intel Core i7";
        $CPU ->TrangThai = 1;
        $CPU->save();
        $CPU = new Cpu();
        $CPU ->TenCPU = "Intel Core i5";
        $CPU ->TrangThai = 1;
        $CPU->save();
        $CPU = new Cpu();
        $CPU ->TenCPU = "Intel Core i3";
        $CPU ->TrangThai = 1;
        $CPU->save();
        $CPU = new Cpu();
        $CPU ->TenCPU = "Intel Celeron/Pentium";
        $CPU ->TrangThai = 1;
        $CPU->save();
        $CPU = new Cpu();
        $CPU ->TenCPU = "ADM";
        $CPU ->TrangThai = 1;
        $CPU->save();
    }
}
