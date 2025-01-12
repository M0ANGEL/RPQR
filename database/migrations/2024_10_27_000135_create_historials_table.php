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
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entrega__id')->constrained('entrega_')->onDelete('cascade');
            $table->integer('cantidad_entregada');
            $table->integer('cantidad_restante');
            $table->integer('cantidad_entrego');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('fecha_entrega')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }
};
