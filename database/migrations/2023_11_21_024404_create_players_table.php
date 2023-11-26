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
        // Player Table 
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('player_name');
            $table->date('date_of_birth');
            $table->smallInteger('height');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('country_id');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
