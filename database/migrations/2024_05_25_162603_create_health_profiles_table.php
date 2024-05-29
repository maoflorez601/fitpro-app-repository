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
        Schema::create('health_profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('pathology_group');
            $table->string('pathology');
            $table->integer('hearth_rate');
            $table->integer('systole'); //presion arterial
            $table->integer('diastole'); //presion arterial
            $table->integer('blood_oxygen');
            $table->integer('blood_glucose');        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_profiles');
    }
};
