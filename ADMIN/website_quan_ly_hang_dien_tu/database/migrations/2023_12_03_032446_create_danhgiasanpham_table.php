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
        Schema::create('danhgiasanpham', function (Blueprint $table) {
            $table->char('MADANHGIA', 11)->primary();
            $table->char('SDT_KH', 10)->index('FK_DanhGiaSanPham_KHACHHANG');
            $table->char('MASP', 11)->index('FK_DanhGiaSanPham_SANPHAM');
            $table->text('DANHGIA')->nullable();
            $table->dateTime('NGAYDANHGIA')->nullable();
            $table->integer('DIEMDANHGIA')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhgiasanpham');
    }
};
