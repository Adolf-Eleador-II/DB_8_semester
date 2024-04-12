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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });

        
        DB::table('users')->insert([
            ['id'=>0, 'name'=>'Anonymous',  'email'=>' ', 'password'=>' ', 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
        ]);
        DB::table('users')->insert([
            ['name'=>'Garry',           'email'=>'1@1', 'password'=>Hash::make('111'), 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['name'=>'Ron',             'email'=>'2@2', 'password'=>Hash::make('222'), 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['name'=>'Germiona',        'email'=>'3@3', 'password'=>Hash::make('333'), 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['name'=>'Hermione',        'email'=>'4@4', 'password'=>Hash::make('444'), 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['name'=>'Polumna',         'email'=>'5@5', 'password'=>Hash::make('555'), 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['name'=>'Lord Voldemort',  'email'=>'6@6', 'password'=>Hash::make('666'), 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['name'=>'Bukla',           'email'=>'7@7', 'password'=>Hash::make('777'), 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
            ['name'=>'Luky',            'email'=>'8@8', 'password'=>Hash::make('888'), 'created_at'=>DB::raw('CURRENT_TIMESTAMP'), 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
