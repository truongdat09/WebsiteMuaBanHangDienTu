<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posts_id')->nullable();
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->timestamps();

            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('set null');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_posts');
    }
};