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
        Schema::create('khachhang', function (Blueprint $table) {
            $table->char('SDT_KH', 10)->primary();
            $table->string('TENKH', 100);
            $table->string('DIACHI', 100)->nullable();
            $table->char('EMAIL', 50)->nullable();
            $table->char('MATKHAU', 50)->nullable();
            $table->char('SDT_NHANHANG', 10)->nullable();
            $table->string('TEN_NHANHANG', 50)->nullable();
            $table->string('DIACHI_NHANHANG', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
};
