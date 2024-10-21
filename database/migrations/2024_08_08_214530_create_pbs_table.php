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
        Schema::create('pbs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('usuario_servinte');
            $table->string('usuario_sebthi');
            $table->string('cedula');
            $table->string('cedula_usuario_referencia');
            $table->string('pb')->nullable();
            $table->string('bodega_nueva')->nullable();
            $table->string('usuario_clonar_servinte')->nullable();
            $table->string('usuario_clonar_sebthi')->nullable();
            $table->string('estado_servinte')->default(0);
            $table->string('estado_sebthi')->default(0);
            $table->string('reporte')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('grupo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pbs');
    }
};
