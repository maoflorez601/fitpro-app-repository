<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('health_profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user_email'); // Nuevo campo para el email del usuario
            $table->string('pathology');
            $table->integer('hearth_rate');
            $table->integer('systole'); //presion arterial
            $table->integer('diastole'); //presion arterial
            $table->integer('blood_oxygen');
            $table->integer('blood_glucose');            
        });
    }

    public function down()
    {
        Schema::dropIfExists('health_profiles');
    }
}

