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
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->char('MANV', 11)->primary();
            $table->string('TENNV', 100)->nullable();
            $table->string('GIOITINH', 5)->nullable();
            $table->char('SDT', 20)->nullable();
            $table->char('MATKHAU', 50)->nullable();
            $table->string('TAIKHOAN', 100)->nullable();
            $table->string('LoaiNhanVien', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
};
