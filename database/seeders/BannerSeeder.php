<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = new Banner();
        $banner -> TenBanner = "Tặng phụ kiện khi mua Laptop";
        $banner -> MoTa = "Tất cả phụ kiện dưới 150 nghìn.";
        $banner -> HinhAnh = "BannerBVphukienmuakemlaptopt8-2020.jpg";
        $banner -> TrangThai = 1;
        $banner -> save();

        $banner = new Banner();
        $banner -> TenBanner = "Sinh nhật 15 năm";
        $banner -> MoTa = "Voucher ưu đãi lên đến 2 triệu.";
        $banner -> HinhAnh = "idt_15nam.png";
        $banner -> TrangThai = 1;
        $banner -> save();

        $banner = new Banner();
        $banner -> TenBanner = "Trả góp 0%";
        $banner -> MoTa = "0% lãi xuất chỉ cần đặt cọc và chứng minh thu nhập.";
        $banner -> HinhAnh = "kac.jpg";
        $banner -> TrangThai = 1;
        $banner -> save();

        $banner = new Banner();
        $banner -> TenBanner = "Giảm giá laptop";
        $banner -> MoTa = "Giảm 30% và 1 đổi 1 trong vòng 1 tháng.";
        $banner -> HinhAnh = "laptop_cu_800x450.jpg";
        $banner -> TrangThai = 1;
        $banner -> save();

        $banner = new Banner();
        $banner -> TenBanner = "Ưu đãi cho sinh viên";
        $banner -> MoTa = "Trả góp 0% và giảm 1,5 triệu và nhiều phần quà khác.";
        $banner -> HinhAnh = "laptop_sv.jpg";
        $banner -> TrangThai = 1;
        $banner -> save();
    }
}
