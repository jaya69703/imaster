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
            // INFO ACCOUNT
            $table->string('name');
            $table->string('image')->default('default.png');
            $table->string('phone');
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>User, 1=>Admin, 2=>Manager */
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // GENERAL INFO
            $table->string('user_typecard')->nullable();
            $table->string('user_idcard')->nullable();
            $table->string('user_position')->nullable();
            $table->string('user_from')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_gender')->nullable();
            $table->string('user_religion')->nullable();
            $table->string('user_placebirth')->nullable();
            $table->string('user_datebirth')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
