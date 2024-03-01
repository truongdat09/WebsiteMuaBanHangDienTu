<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanpham', function (Blueprint $table) {
            $table->foreign(['MALOAI'], 'FK_SanPham_LoaiSanPham')->references(['MALOAI'])->on('loaisanppham');
            $table->foreign(['MATUONGHIEU'], 'FK_SanPham_ThuongHieu')->references(['MATUONGHIEU'])->on('thuonghieu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanpham', function (Blueprint $table) {
            $table->dropForeign('FK_SanPham_LoaiSanPham');
            $table->dropForeign('FK_SanPham_ThuongHieu');
        });
    }
};
