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
        Schema::create('tirada', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->unsignedBigInteger('idPartida');
            $table->foreign('idPartida')->references('id')->on('partida')->onDelete('cascade');
            $table->unsignedBigInteger('tiradaJugador1');
            $table->foreign('tiradaJugador1')->references('id')->on('infotiradas')->onDelete('cascade');
            $table->unsignedBigInteger('tiradaJugador2');
            $table->foreign('tiradaJugador2')->references('id')->on('infotiradas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tirada');
    }
};
