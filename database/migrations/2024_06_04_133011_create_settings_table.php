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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('about_app')->nullable();
            $table->string('phone_number', 255)->nullable();
            $table->text('notification_setting_text')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('fb_link', 255)->nullable();
            $table->string('tw_link', 255)->nullable();
            $table->string('insta_link', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
