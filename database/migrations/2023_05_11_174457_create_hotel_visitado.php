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
        Schema::create('hotel_visitado', function (Blueprint $table) {
            $table->id('idHotVis');
            $table->date('fechaEntrada');
            $table->date('fechaSalida');
            $table->decimal('punUbi', 3, 1);
            $table->decimal('punLim', 3, 1);
            $table->decimal('punSer', 3, 1);
            $table->decimal('punCalPre', 3, 1);
            $table->text('comentario');
            $table->unsignedBigInteger('idUsu');
            $table->foreign('idUsu')->references('idUsu')->on('users');
            $table->unsignedBigInteger('idHotel');
            $table->foreign('idHotel')->references('idHotel')->on('hotel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_visitado');
    }
};
