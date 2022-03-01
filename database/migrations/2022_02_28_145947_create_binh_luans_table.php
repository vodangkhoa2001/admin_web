<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BinhLuan', function (Blueprint $table) {
            $table->id();
            $table->string('MaSanPham');
            $table->foreign('MaSanPham')->references('id')->on('SanPham');
            $table->string('MaTaiKhoan');
            $table->foreign('MaTaiKhoan')->references('id')->on('TaiKhoan');
            $table->string("NoiDung");
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
        Schema::dropIfExists('binh_luans');
    }
}
