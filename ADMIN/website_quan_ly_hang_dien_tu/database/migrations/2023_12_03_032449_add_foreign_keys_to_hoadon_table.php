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
        Schema::table('hoadon', function (Blueprint $table) {
            $table->foreign(['MaTT'], 'fk_hoadon_trangthai')->references(['MaTT'])->on('trangthaihoadon');
            $table->foreign(['SDT_KH'], 'FK_HOADON_KHACHHANG')->references(['SDT_KH'])->on('khachhang');
            $table->foreign(['MaHT'], 'fk_hoadon_hinhthuc')->references(['MaHT'])->on('hinhthucthanhtoan');
            $table->foreign(['MANV'], 'FK_HOADON_NHANVIEN')->references(['MANV'])->on('nhanvien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoadon', function (Blueprint $table) {
            $table->dropForeign('fk_hoadon_trangthai');
            $table->dropForeign('FK_HOADON_KHACHHANG');
            $table->dropForeign('fk_hoadon_hinhthuc');
            $table->dropForeign('FK_HOADON_NHANVIEN');
        });
    }
};
