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
            $table->foreignId('id_user')->constrained('users')->comment('Создатель поста');
            $table->text('content')->comment('Содержание поста');
            $table->timestamp('date_create')->default(\DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания поста');
            $table->unsignedInteger('like')->default(0)->comment('Количество лайков');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_post')->constrained('posts')->comment('Пост, к которому прикреплён комментарий');
            $table->foreignId('id_user')->constrained('users')->comment('Создатель комментария');
            $table->timestamp('date_create')->default(\DB::raw('CURRENT_TIMESTAMP'))->nullable()->comment('Дата создания комментария');
            $table->text('content')->comment('Содержание комментария');
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_parent')->nullable()->constrained('tags')->comment('Обобщающий тег');
            $table->string('name')->nullable()->unique()->comment('Название тега');
        });

        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tag')->constrained('tags')->comment('Тег');
            $table->foreignId('id_post')->constrained('posts')->comment('Пост');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
    }
};
