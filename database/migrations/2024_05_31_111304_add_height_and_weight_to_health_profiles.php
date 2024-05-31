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
        Schema::table('health_profiles', function (Blueprint $table) {
            Schema::table('health_profiles', function (Blueprint $table) {
                $table->integer('height')->after('user_email')->comment('Height in centimeters');
                $table->integer('weight')->after('height')->comment('Weight in kilogrames');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('health_profiles', function (Blueprint $table) {
            $table->dropColumn('height');
            $table->dropColumn('weight');
        });
    }
};
