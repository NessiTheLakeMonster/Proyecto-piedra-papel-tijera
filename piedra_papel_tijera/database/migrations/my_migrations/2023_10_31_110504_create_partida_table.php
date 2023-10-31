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
        Schema::create('partida', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->unsignedBigInteger('idJugador1');
            $table->foreign('idJugador1')->references('id')->on('jugadores')->onDelete('cascade');
            $table->unsignedBigInteger('idJugador2');
            $table->foreign('idJugador2')->references('id')->on('jugadores')->onDelete('cascade');
            $table->string('estado');
            $table->boolean('finalizado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partida');
    }
};
