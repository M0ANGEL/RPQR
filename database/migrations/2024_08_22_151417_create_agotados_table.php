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
        Schema::create('agotados', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->boolean('estado');
            $table->date('fecha_En');
            $table->string('estado_p');
            $table->string('marca');
            $table->string('tiene_carta');
            $table->string('pdfs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agotados');
    }
};
