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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('name', 255);
            $table->date('d_o_b');
            $table->date('last_donation_date')->nullable();
            $table->string('pin_code', 255)->nullable();
            $table->morphs('clientable');
            $table->timestamps();
		});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
