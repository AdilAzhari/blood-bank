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
        Schema::create('donation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name', 255);
            $table->string('patient_phone_number', 255);
            $table->string('hospital_name', 255);
            $table->tinyInteger('patient_age');
            $table->tinyInteger('bags_number');
            $table->text('hospital_address')->nullable();
            $table->text('details')->nullable();
            $table->string('notes', 255)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 10, 8)->nullable();

            $table->foreignId('city_id')->constrained();
            $table->foreignId('blood_type_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_requests');
    }
};
