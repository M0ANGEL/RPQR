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
        Schema::create('novedades', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_novedad');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('cargo');
            $table->string('bodega');
            $table->string('nombre_completo');
            $table->string('numero_cedula');
            $table->string('numero_telefono');
            $table->longText('detalle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novedades');
    }
};
