<<<<<<< HEAD
=======
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
>>>>>>> origin/Huy
<?php

namespace Database\Seeders;
use App\Http\Requests;
use Illuminate\Database\Seeder;
use App\Models\LoaiTaiKhoan;
use Illuminate\Support\Facades\DB;

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
        // DB::table('loaitaikhoan')->insert([
        //     array(
        //         'id'=>1,
        //         'TenLoaiTaiKhoa'=>'User',
        //         'TrangThai_LoaiTaiKhoan' => 1,
        //     ),
        //     array(
        //         'id'=>2,
        //         'TenLoaiTaiKhoa'=>'Admin',
        //         'TrangThai_LoaiTaiKhoan' => 1,
        //     ),
        // ]);

        $LoaiTaiKhoan=new LoaiTaiKhoan();
        $LoaiTaiKhoan->TenLoaiTaiKhoan="User";
        $LoaiTaiKhoan->TrangThai_LoaiTaiKhoan=1;
        $LoaiTaiKhoan->save();

        $LoaiTaiKhoan=new LoaiTaiKhoan();
        $LoaiTaiKhoan->TenLoaiTaiKhoan="Admin";
        $LoaiTaiKhoan->TrangThai_LoaiTaiKhoan=2;
        $LoaiTaiKhoan->save();

        $LoaiTaiKhoan=new LoaiTaiKhoan();
        $LoaiTaiKhoan->TenLoaiTaiKhoan="SuperAdmin";
        $LoaiTaiKhoan->TrangThai_LoaiTaiKhoan=1;
        $LoaiTaiKhoan->save();
    }
}
<<<<<<< HEAD
=======
>>>>>>> dfe7465163aaeafa25396bf436d99c4d52a605b2
>>>>>>> origin/Huy
