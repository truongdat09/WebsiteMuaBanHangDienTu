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
        Schema::table('chitiet_hd', function (Blueprint $table) {
            $table->foreign(['MAHD'], 'FK_CHITIET_HD_HOADON')->references(['MAHD'])->on('hoadon');
            $table->foreign(['MASP'], 'FK_CHITIET_HD_SANPHAM')->references(['MASP'])->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chitiet_hd', function (Blueprint $table) {
            $table->dropForeign('FK_CHITIET_HD_HOADON');
            $table->dropForeign('FK_CHITIET_HD_SANPHAM');
        });
    }
};
