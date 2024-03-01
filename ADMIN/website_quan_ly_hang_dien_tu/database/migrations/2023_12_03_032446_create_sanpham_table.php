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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->char('MASP', 11)->primary();
            $table->char('MALOAI', 11)->index('FK_SanPham_LoaiSanPham');
            $table->string('TENSP', 100)->nullable()->unique('TENSP');
            $table->text('MOTA')->nullable();
            $table->char('HINH', 50)->nullable();
            $table->integer('SOLUONG')->nullable();
            $table->integer('GIABAN')->nullable();
            $table->char('MATUONGHIEU', 11)->nullable()->index('FK_SanPham_ThuongHieu');
            $table->boolean('TRANGTHAI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
};
