<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_post')->constrained('posts')->comment('Пост, к которому прикреплён комментарий');
            $table->foreignId('id_user')->constrained('users')->comment('Создатель комментария');
            $table->text('content')->comment('Содержание комментария');
            $table->timestamps();
        });
        
        DB::table('comments')->insert([
            ['id_post'=>2, 'id_user'=>6, 'content'=>'I agree', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_post'=>3, 'id_user'=>6, 'content'=>'I agree', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_post'=>5, 'id_user'=>6, 'content'=>'I agree', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_post'=>2, 'id_user'=>1, 'content'=>'No', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_post'=>2, 'id_user'=>5, 'content'=>'No', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_post'=>2, 'id_user'=>7, 'content'=>'No', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_post'=>5, 'id_user'=>1, 'content'=>'No', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_post'=>5, 'id_user'=>5, 'content'=>'No', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
