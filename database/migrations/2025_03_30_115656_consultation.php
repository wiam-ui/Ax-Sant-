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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->float('prix',5,2);
            $table->string('Etat')->default("en cours");
            $table->string('type');
            $table->foreignId('patient_id')->references('id')->on('patients')->constrained()->onDelete('cascade');
            $table->foreignId('medecin_id')->references('id')->on('medecins')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
