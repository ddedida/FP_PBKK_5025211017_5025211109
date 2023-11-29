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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('home_goal')->nullable();
            $table->tinyInteger('away_goal')->nullable();
            $table->date('date');
            $table->boolean('played')->default(false);
            $table->unsignedBigInteger('season_id');
            $table->unsignedBigInteger('home_teamstatistic_id');
            $table->unsignedBigInteger('away_teamstatistic_id');
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->foreign('home_teamstatistic_id')->references('id')->on('teamstatistics');
            $table->foreign('away_teamstatistic_id')->references('id')->on('teamstatistics');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
