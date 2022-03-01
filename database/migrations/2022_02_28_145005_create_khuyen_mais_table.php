<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhuyenMaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KhuyenMai', function (Blueprint $table) {
            $table->id();
            $table->string('MaSanPhamKhuyenMai');
            $table->foreign('MaSanPhamKhuyenMai')->references('id')->on('SanPham');
            $table->string('MaTaiKhoan');
            $table->foreign('MaTaiKhoan')->references('id')->on('TaiKhoan');
            $table->integer("DonGiaKhuyenMai");
            $table->string("MoTa");
            $table->integer("SoLuongKhuyenMai");
            $table->date("NgayBatDau");
            $table->date("NgayKetThuc");
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
        Schema::dropIfExists('khuyen_mais');
    }
}
