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
        Schema::create('huvs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cedula');
            $table->string('area')->default('Redvital');
            $table->string('telefono')->nullable();
            $table->string('correo_redv')->default('soporte@utredvital.com');
            $table->string('cargo');
            $table->string('servinte_no')->default(0);
            $table->string('bodega');
            $table->string('name_referencia');
            $table->string('usuario_clonar_huv');
            $table->string('usuario_clonar_sebthi');
            $table->string('cedula_clonar');
            $table->boolean('activo_servinte')->default(false);
            $table->boolean('activo_sebthi')->default(false);
            $table->boolean('confirmado')->default(false);
            /* llave foranea */
            $table->unsignedBigInteger('user_id');
            /*  */
            $table->string('login_servinte')->nullable();
            $table->string('password_servinte')->nullable();
            $table->string('login_sebthi')->nullable();
            $table->string('password_sebthi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huvs');
    }
};
