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
        Schema::create('hotel', function (Blueprint $table) {
            $table->id('idHotel');
            $table->string('nombre');
            $table->string('direccion');
            $table->text('descripcion');
            $table->integer('precio');
            $table->decimal('valoracion', 3, 1);
            $table->decimal('valUbi', 3, 1);
            $table->decimal('valLim', 3, 1);
            $table->decimal('valSer', 3, 1);
            $table->decimal('valCalPre', 3, 1);
            $table->string('foto1');
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
            $table->string('foto6')->nullable();
            $table->foreignId("idCiudad")
                  ->refences("idCiudad")
                  ->on("ciudad")
                  ->unsignedBigInteger();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel');
    }
};
