<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaiKhoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TaiKhoan', function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("TenDangNhap")->nullable();
            $table->string("password");
            $table->string("Email");
            $table->string("SDT");
            $table->string("DiaChi");
            $table->string("HoTen");
            $table->string("HinhAnh");
            $table->unsignedBigInteger('ID_LoaiTaiKhoan');
            $table->foreign('ID_LoaiTaiKhoan')->references('id')->on('LoaiTaiKhoan');
            $table->integer("TrangThai_TaiKhoan");
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
        Schema::dropIfExists('tai_khoans');
    }
}
