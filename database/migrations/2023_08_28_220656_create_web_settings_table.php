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
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();
            $table->string('web_name'); // Website Name
            $table->string('web_logo'); // Website Logo
            $table->string('web_dev');  // Website Developer
            $table->dateTime('date_backup')->nullable();    // Website Backup Database Date
            $table->dateTime('date_restore')->nullable();   // Website Restore Database Date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_settings');
    }
};
