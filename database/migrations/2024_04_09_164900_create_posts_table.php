<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->comment('Создатель поста');
            $table->text('content')->comment('Содержание поста');
            $table->unsignedInteger('like')->default(0)->comment('Количество лайков');
            $table->timestamps();
        });
        
        DB::table('posts')->insert([
            ['id_user'=>5, 'content'=>'Have a good day', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_user'=>6, 'content'=>'The good Lord Voldemort', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_user'=>6, 'content'=>'The bestLord Voldemort', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_user'=>2, 'content'=>'Text, text, more text', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_user'=>6, 'content'=>'The incomparable Lord Voldemort', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
