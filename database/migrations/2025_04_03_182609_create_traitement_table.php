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
        Schema::create('traitement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultation_id')->references('id')->on('consultations')->constrained()->onDelete('cascade');
            $table->foreignId('medicament_id')->references('id')->on('medicaments')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traitement');
    }
};
