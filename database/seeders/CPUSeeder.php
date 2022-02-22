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
        $CPU->save();
        $CPU = new Cpu();
        $CPU ->TenCPU = "Intel Core i5";
        $CPU->save();
        $CPU = new Cpu();
        $CPU ->TenCPU = "Intel Core i3";
        $CPU->save();
        $CPU = new Cpu();
        $CPU ->TenCPU = "Intel Celeron/Pentium";
        $CPU->save();
        $CPU = new Cpu();
        $CPU ->TenCPU = "ADM";
        $CPU->save();
    }
}
