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
        if (!Schema::hasTable('cities')) {

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
                $table->enum('blood_typ', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);

                $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
                $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_requests');
    }
};
