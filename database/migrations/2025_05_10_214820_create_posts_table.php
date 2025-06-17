<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('タイトル');
            $table->string('slug')->comment('URL用スラッグ');
            $table->text('body')->comment('本文');
            $table->enum('status',[
                'draft',
                'publish',
                'private',
            ])->default('draft')->comment('ステータス');
            //外部キー
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
