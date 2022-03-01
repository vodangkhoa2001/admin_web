<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SanPham;
class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $SanPham=new SanPham();
        $SanPham->id="SP01";
        $SanPham->MaDongSanPham=1;
        $SanPham->TenSanPham="Laptop Gaming Acer Nitro 5 AN515 45 R6EV";
        $SanPham->GiaNhap=20000000;
        $SanPham->GiaBan=21000000;
        $SanPham->SoLuong=20;
        $SanPham->MaCpu=1;
        $SanPham->MaRam=1;
        $SanPham->MaOCung=1;
        $SanPham->MaMau=1;
        $SanPham->MaCardDoHoa=1;
        $SanPham->MaManHinh=1;
        $SanPham->MaNhaSanXuat=1;
        $SanPham->HinhAnh="nitro.png";
        $SanPham->MoTa="Nitro 5 AN515-45 R6EV được trang bị bộ vi xử lý AMD Ryzen 5 5600H";
        $SanPham->save();

        $SanPham=new SanPham();
        $SanPham->id="SP02";
        $SanPham->MaDongSanPham=1;
        $SanPham->TenSanPham="Laptop Gaming Acer Aspire 7 A715 42G R1SB";
        $SanPham->GiaNhap=19000000;
        $SanPham->GiaBan=22000000;
        $SanPham->SoLuong=50;
        $SanPham->MaCpu=2;
        $SanPham->MaRam=2;
        $SanPham->MaOCung=2;
        $SanPham->MaMau=2;
        $SanPham->MaCardDoHoa=2;
        $SanPham->MaManHinh=2;
        $SanPham->MaNhaSanXuat=1;
        $SanPham->HinhAnh="aspire7.png";
        $SanPham->MoTa="Acer Aspire 7 2020 A715 42G tích hợp card đồ họa NVIDIA GTX1650 4GB GDDR6 ra mắt năm 2020, là laptop chơi game tốt nhất phân khúc.";
        $SanPham->save();

        $SanPham=new SanPham();
        $SanPham->id="SP03";
        $SanPham->MaDongSanPham=2;
        $SanPham->TenSanPham="Laptop MSI Creator Z16 A11UET 217VN";
        $SanPham->GiaNhap=54000000;
        $SanPham->GiaBan=55000000;
        $SanPham->SoLuong=50;
        $SanPham->MaCpu=3;
        $SanPham->MaRam=3;
        $SanPham->MaOCung=3;
        $SanPham->MaMau=3;
        $SanPham->MaCardDoHoa=4;
        $SanPham->MaManHinh=3;
        $SanPham->MaNhaSanXuat=2;
        $SanPham->HinhAnh="CreatorZ16.png";
        $SanPham->MoTa="Laptop MSI Creator Z16 A11UET dựa trên triết lý thiết kế lấy con người làm trọng tâm, áp dụng Tỷ lệ vàng trong thiết kế sản phẩm với công nghệ tiên tiến hàng đầu.";
        $SanPham->save();
    }
}
