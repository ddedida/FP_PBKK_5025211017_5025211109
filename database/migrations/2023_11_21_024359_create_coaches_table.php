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
        // Coach Table
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('coach_name');
            $table->date('date_of_birth');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('team_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
