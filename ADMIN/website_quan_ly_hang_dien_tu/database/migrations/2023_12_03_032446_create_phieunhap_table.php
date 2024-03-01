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
        Schema::create('phieunhap', function (Blueprint $table) {
            $table->char('MAPN', 11)->primary();
            $table->char('MANCC', 11)->index('FK_PHIEUNHAP_NHACUNGCAP');
            $table->dateTime('NGAYNHAP')->nullable();
            $table->integer('TONGNHAP')->nullable();
            $table->char('MANV', 11)->nullable()->index('FK_PHIEUNHAP_NHANVIEN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieunhap');
    }
};
