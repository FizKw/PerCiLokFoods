<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->string('usertype')->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'f_name' => 'admin',
                'l_name' => 'only',
                'date_of_birth' => '2000-01-01',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'usertype' => 'admin'
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
