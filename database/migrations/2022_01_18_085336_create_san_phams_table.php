<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SanPham', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('MaDongSanPham');
            $table->foreign('MaDongSanPham')->references('id')->on('DongSanPham');
            $table->string("TenSanPham");
            $table->integer("GiaNhap");
            $table->integer("GiaBan");
            $table->integer("TonKho");
            $table->unsignedBigInteger('MaNhaSanXuat');
            $table->foreign('MaNhaSanXuat')->references('id')->on('NhaSanXuat');
            $table->string("Hinh");
            $table->string("MoTa");
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
        Schema::dropIfExists('san_phams');
    }
}
