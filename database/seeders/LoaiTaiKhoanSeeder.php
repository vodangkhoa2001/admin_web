<<<<<<< HEAD
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoaiTaiKhoan;

class LoaiTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $LoaiTaiKhoan=new LoaiTaiKhoan();
        $LoaiTaiKhoan->TenLoaiTaiKhoan="User";
        $LoaiTaiKhoan->TrangThai_LoaiTaiKhoan=1;
        $LoaiTaiKhoan->save();

        $LoaiTaiKhoan=new LoaiTaiKhoan();
        $LoaiTaiKhoan->TenLoaiTaiKhoan="Admin";
        $LoaiTaiKhoan->TrangThai_LoaiTaiKhoan=1;
        $LoaiTaiKhoan->save();
    }
}
=======
<?php

namespace Database\Seeders;
use App\Http\Requests;
use Illuminate\Database\Seeder;
use App\Models\LoaiTaiKhoan;

class LoaiTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $LoaiTaiKhoan=new LoaiTaiKhoan();
        $LoaiTaiKhoan->TenLoaiTaiKhoan="User";
        $LoaiTaiKhoan->TrangThai_LoaiTaiKhoan=1;
        $LoaiTaiKhoan->save();

        $LoaiTaiKhoan=new LoaiTaiKhoan();
        $LoaiTaiKhoan->TenLoaiTaiKhoan="Admin";
        $LoaiTaiKhoan->TrangThai_LoaiTaiKhoan=1;
        $LoaiTaiKhoan->save();

        $LoaiTaiKhoan=new LoaiTaiKhoan();
        $LoaiTaiKhoan->TenLoaiTaiKhoan="SuperAdmin";
        $LoaiTaiKhoan->TrangThai_LoaiTaiKhoan=1;
        $LoaiTaiKhoan->save();
    }
}
>>>>>>> dfe7465163aaeafa25396bf436d99c4d52a605b2
