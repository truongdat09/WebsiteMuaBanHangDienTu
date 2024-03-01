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
        Schema::table('phieunhap', function (Blueprint $table) {
            $table->foreign(['MANCC'], 'FK_PHIEUNHAP_NHACUNGCAP')->references(['MANCC'])->on('nhacungcap');
            $table->foreign(['MANV'], 'FK_PHIEUNHAP_NHANVIEN')->references(['MANV'])->on('nhanvien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phieunhap', function (Blueprint $table) {
            $table->dropForeign('FK_PHIEUNHAP_NHACUNGCAP');
            $table->dropForeign('FK_PHIEUNHAP_NHANVIEN');
        });
    }
};
