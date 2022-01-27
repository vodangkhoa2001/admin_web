<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHoaDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChiTietHoaDon', function (Blueprint $table) {
            $table->id();
            $table->string('MaHoaDon');
            $table->foreign('MaHoaDon')->references('id')->on('HoaDon');
            $table->string('MaSanPham');
            $table->foreign('MaSanPham')->references('id')->on('SanPham');
            $table->integer("SoLuong");
            $table->integer("DonGia");
            $table->integer("DonGiaKhuyenMai");
            $table->integer("TrangThai_ChiTietHoaDon");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_hoa_dons');
    }
}
