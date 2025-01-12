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
        Schema::create('recepcion_tecnicas', function (Blueprint $table) {
            $table->id();
            $table->integer('numerador');
            $table->integer('denominador');
            $table->float('porcentaje');
            $table->string('bodega');
            $table->string('analisis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepcion_tecnicas');
    }
};
