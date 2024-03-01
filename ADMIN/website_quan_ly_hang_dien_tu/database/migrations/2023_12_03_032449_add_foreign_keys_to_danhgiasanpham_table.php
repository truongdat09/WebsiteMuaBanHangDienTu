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
        Schema::table('danhgiasanpham', function (Blueprint $table) {
            $table->foreign(['SDT_KH'], 'FK_DanhGiaSanPham_KHACHHANG')->references(['SDT_KH'])->on('khachhang');
            $table->foreign(['MASP'], 'FK_DanhGiaSanPham_SANPHAM')->references(['MASP'])->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('danhgiasanpham', function (Blueprint $table) {
            $table->dropForeign('FK_DanhGiaSanPham_KHACHHANG');
            $table->dropForeign('FK_DanhGiaSanPham_SANPHAM');
        });
    }
};
