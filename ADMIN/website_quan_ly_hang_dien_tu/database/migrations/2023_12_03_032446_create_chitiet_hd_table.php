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
        Schema::create('chitiet_hd', function (Blueprint $table) {
            $table->char('MASP', 11);
            $table->char('MAHD', 20)->index('FK_CHITIET_HD_HOADON');
            $table->integer('SL')->nullable();
            $table->integer('GIABAN')->nullable();

            $table->primary(['MASP', 'MAHD']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiet_hd');
    }
};
