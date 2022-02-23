<<<<<<< HEAD
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
            $table->string("id")->primary();
            $table->unsignedBigInteger('MaDongSanPham');
            $table->foreign('MaDongSanPham')->references('id')->on('DongSanPham');
            $table->string("TenSanPham");
            $table->integer("GiaNhap");
            $table->integer("GiaBan");
            $table->integer("SoLuong");
            $table->unsignedBigInteger('MaNhaSanXuat');
            $table->foreign('MaNhaSanXuat')->references('id')->on('NhaSanXuat');
            $table->string("HinhAnh");
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
=======
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
            $table->string("id")->primary();
            $table->unsignedBigInteger('MaDongSanPham');
            $table->foreign('MaDongSanPham')->references('id')->on('DongSanPham');
            $table->string("TenSanPham");
            $table->integer("GiaNhap");
            $table->integer("GiaBan");
            $table->integer("SoLuong");
            $table->unsignedBigInteger('MaMau');
            $table->foreign('MaMau')->references('id')->on('MauSac');
            $table->unsignedBigInteger('MaRam');
            $table->foreign('MaRam')->references('id')->on('Ram');
            $table->unsignedBigInteger('MaOCung');
            $table->foreign('MaOCung')->references('id')->on('OCung');
            $table->unsignedBigInteger('MaManHinh');
            $table->foreign('MaManHinh')->references('id')->on('ManHinh');
            $table->unsignedBigInteger('MaCPU');
            $table->foreign('MaCPU')->references('id')->on('Cpu');
            $table->unsignedBigInteger('MaNhaSanXuat');
            $table->foreign('MaNhaSanXuat')->references('id')->on('NhaSanXuat');
            $table->string("HinhAnh");
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
>>>>>>> dfe7465163aaeafa25396bf436d99c4d52a605b2
