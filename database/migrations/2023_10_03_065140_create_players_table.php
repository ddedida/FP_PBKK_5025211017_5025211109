<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('playername');
            $table->string('position');
            $table->string('nasionality');
            $table->date('datebirth');
            $table->integer('age');
            $table->integer('height');
            $table->integer('backnumber');
            $table->integer('appearance');
            $table->integer('goal');
            $table->integer('asist');
            $table->integer('cleansheet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
};
