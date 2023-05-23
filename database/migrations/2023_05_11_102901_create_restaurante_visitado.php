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
        Schema::create('restaurante_visitado', function (Blueprint $table) {
            $table->id('idResVis');
            $table->date('fechaVisita');
            $table->decimal('punCom', 3, 1);
            $table->decimal('punSer', 3, 1);
            $table->decimal('punCalPre', 3, 1);
            $table->text('comentario');
            $table->unsignedBigInteger('idUsu');
            $table->foreign('idUsu')->references('idUsu')->on('users');
            $table->unsignedBigInteger('idRes');
            $table->foreign('idRes')->references('idRes')->on('restaurante');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurante_visitado');
    }
};
