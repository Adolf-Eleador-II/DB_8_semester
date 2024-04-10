<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_parent')->nullable()->constrained('tags')->comment('Обобщающий тег');
            $table->string('name')->nullable()->unique()->comment('Название тега');
            $table->boolean('acceptable')->default(true);
            $table->timestamps();
        });
        
        DB::table('tags')->insert([
            ['name'=>'Lord_Voldemort', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['name'=>'text', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['name'=>'good_day', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['name'=>'Perfect', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
        ]);
        DB::table('tags')->insert([
            ['id_parent'=>1, 'name'=>'Lord', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['id_parent'=>1, 'name'=>'Voldemort', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
