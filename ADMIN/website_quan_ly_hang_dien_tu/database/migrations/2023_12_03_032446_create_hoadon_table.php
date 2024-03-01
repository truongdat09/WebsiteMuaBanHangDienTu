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
        Schema::create('hoadon', function (Blueprint $table) {
            $table->char('MAHD', 20)->primary();
            $table->char('SDT_KH', 10)->index('FK_HOADON_KHACHHANG');
            $table->char('MANV', 11)->index('FK_HOADON_NHANVIEN');
            $table->dateTime('NGAYLAP')->nullable();
            $table->integer('TONGTIEN')->nullable();
            $table->integer('MaHT')->index('fk_hoadon_hinhthuc');
            $table->integer('MaTT')->index('fk_hoadon_trangthai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadon');
    }
};
