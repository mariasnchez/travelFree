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
        Schema::create('destinos', function (Blueprint $table) {
            $table->id('id');
            $table->string('ciudad');
            $table->string('hotel');
            $table->integer('noches');
            $table->integer('valoracion');
            $table->foreignId("idUsu")
                  ->refences("idUsu")
                  ->on("users")
                  ->unsignedBigInteger();
            $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinos');
    }
};
