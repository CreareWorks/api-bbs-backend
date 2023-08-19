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
        Schema::create('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('comment_id')->autoIncrement();
            $table->unsignedBigInteger('comment_user_id');
            $table->foreign('comment_user_id')->references('id')->on('users')->onDelete('cascade'); # 外部キー制約をつける
            $table->unsignedBigInteger('comment_post_id');
            $table->foreign('comment_post_id')->references('post_id')->on('posts')->onDelete('cascade'); # 外部キー制約をつける
            $table->string('comment_body')->nullable();
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
        Schema::dropIfExists('comments');
    }
};
