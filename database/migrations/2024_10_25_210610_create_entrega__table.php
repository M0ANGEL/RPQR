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
        Schema::create('entrega_', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mipres_paciente_id')->constrained('mipres_paciente')->onDelete('cascade');
            $table->foreignId('medicamento_id')->constrained('medicamentos')->onDelete('cascade'); // Cambiar a medicamento_id
            $table->integer('cantidad_entregada');
            $table->integer('cantidad_restante');
            $table->string('prescripcion');
            $table->string('ambito');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('fecha_mipres');
            $table->date('fecha_entrega')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_');
    }
};
