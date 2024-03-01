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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->boolean('is_featured')->nullable();
            $table->enum('status', [1, 2]);
            $table->string('image')->nullable();
            $table->string('excerpt')->nullable();
            $table->string('content')->nullable();
            $table->integer('priority')->nullable();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->timestamp('posted_at');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};