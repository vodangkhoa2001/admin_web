<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OCung;

class OCungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Ocung = new OCung();
        $Ocung ->TenOCung="SSD 2 TB";
        $Ocung ->TrangThai = 1;
        $Ocung->save();
        $Ocung = new OCung();
        $Ocung ->TenOCung="SSD 1 TB";
        $Ocung ->TrangThai = 1;
        $Ocung->save();
        $Ocung = new OCung();
        $Ocung ->TenOCung="SSD 512 GB";
        $Ocung ->TrangThai = 1;
        $Ocung->save();
        $Ocung = new OCung();
        $Ocung ->TenOCung="SSD 256 GB";
        $Ocung ->TrangThai = 1;
        $Ocung->save();
        $Ocung = new OCung();
        $Ocung ->TenOCung="SSD 128 GB";
        $Ocung ->TrangThai = 1;
        $Ocung->save();
    }
}
