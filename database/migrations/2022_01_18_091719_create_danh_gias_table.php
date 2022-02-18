<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhGiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DanhGia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('MaChiTietSanPham');
            $table->foreign('MaChiTietSanPham')->references('id')->on('ChiTietSanPham');
            $table->string('MaTaiKhoan');
            $table->foreign('MaTaiKhoan')->references('id')->on('TaiKhoan');
            $table->string("NoiDung");
            $table->integer("SoSao");
            $table->integer("TrangThai");
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
        Schema::dropIfExists('danh_gias');
    }
}
