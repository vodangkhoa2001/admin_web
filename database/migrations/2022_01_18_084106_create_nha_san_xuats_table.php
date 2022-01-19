<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhaSanXuatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NhaSanXuat', function (Blueprint $table) {
            $table->id();
            $table->string("TenNhaSanXuat");
            $table->string("SDT_NhaSanXuat");
            $table->string("DiaChiNhaSanXuat");
            $table->string("EmailNhaSanXuat");
            $table->string("Fax");
            $table->integer("TrangThai_NhaSanXuat");
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
        Schema::dropIfExists('nha_san_xuats');
    }
}
