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
            $table->foreignId('idUser')->constrained('users')->comment('Создатель поста');
            $table->text('content')->comment('Содержание поста');
            $table->timestamp('dateCreate')->nullable()->comment('Дата создания поста');
            $table->unsignedInteger('like')->comment('Количество лайков');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idPost')->constrained('posts')->comment('Пост, к которому прикреплён комментарий');
            $table->foreignId('idUser')->constrained('users')->comment('Создатель комментария');
            $table->timestamp('dateCreate')->nullable()->comment('Дата создания комментария');
            $table->text('content')->comment('Содержание комментария');
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idParent')->constrained('tags')->comment('Обобщающий тег');
            $table->string('name')->comment('Название тега');
        });

        Schema::create('posts_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idTag')->constrained('tags')->comment('Тег');
            $table->foreignId('idPost')->constrained('posts')->comment('Пост');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
    }
};
