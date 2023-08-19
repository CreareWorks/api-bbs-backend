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
        Schema::create('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id')->autoIncrement();
            $table->unsignedBigInteger('post_user_id');
            $table->foreign('post_user_id')->references('id')->on('users')->onDelete('cascade'); # 外部キー制約をつける
            $table->string('post_title')->nullable();
            $table->string('post_body')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->timestamp('updated_at');
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
