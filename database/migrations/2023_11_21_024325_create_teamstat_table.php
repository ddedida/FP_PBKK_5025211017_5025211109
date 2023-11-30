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
        // Team Statistic Table
        Schema::create('teamstatistics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('win');
            $table->integer('draw');
            $table->integer('lose');
            $table->integer('goal_for');
            $table->integer('goal_againts');
            $table->integer('goal_diff');
            $table->integer('played');
            $table->integer('points');
            $table->unsignedBigInteger('season_id');
            $table->unsignedBigInteger('team_id');
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_statistics');
    }
};
