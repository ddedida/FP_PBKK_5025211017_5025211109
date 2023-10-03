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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('clubName');
            $table->string('city');
            $table->integer('played');
            $table->integer('won');
            $table->integer('lose');
            $table->integer('draw');
            $table->integer('ga');
            $table->integer('gf');
            $table->integer('gd');
            $table->integer('point');
            $table->integer('position');
            $table->date('since');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clubs');
    }
};
