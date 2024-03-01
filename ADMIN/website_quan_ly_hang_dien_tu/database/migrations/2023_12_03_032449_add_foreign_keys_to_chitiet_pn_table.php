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
        Schema::table('chitiet_pn', function (Blueprint $table) {
            $table->foreign(['MAPN'], 'FK_CHITIET_PN_PHIEUNHAP')->references(['MAPN'])->on('phieunhap');
            $table->foreign(['MASP'], 'FK_CHITIET_PN_SANPHAM')->references(['MASP'])->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chitiet_pn', function (Blueprint $table) {
            $table->dropForeign('FK_CHITIET_PN_PHIEUNHAP');
            $table->dropForeign('FK_CHITIET_PN_SANPHAM');
        });
    }
};
