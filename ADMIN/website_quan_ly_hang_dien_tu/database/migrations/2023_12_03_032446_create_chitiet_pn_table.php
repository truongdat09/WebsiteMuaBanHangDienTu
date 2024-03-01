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
        Schema::create('chitiet_pn', function (Blueprint $table) {
            $table->char('MAPN', 11);
            $table->char('MASP', 11)->index('FK_CHITIET_PN_SANPHAM');
            $table->integer('SL')->nullable();
            $table->integer('GIANHAP')->nullable();
            $table->integer('TONGTIENNHAP')->nullable();

            $table->primary(['MAPN', 'MASP']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiet_pn');
    }
};
