<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChiTietSanPham', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('MaSanPham');
            $table->foreign('MaSanPham')->references('id')->on('SanPham');
            $table->string("MauSac");
            $table->string("Ram");
            $table->string("OCung");
            $table->string("ManHinh");
            $table->string("CardDoHoa");
            $table->string("MoTa");
            $table->integer("TrangThai_ChiTietSanPham");
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
        Schema::dropIfExists('chi_tiet_san_phams');
    }
}
