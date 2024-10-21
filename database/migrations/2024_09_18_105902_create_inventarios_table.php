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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('bodega');
            $table->string('piso');
            $table->date('fecha_entrega');
            $table->string('estado')->default(0);
            $table->string('pareja');
            $table->string('mouse');
            $table->string('teclado');
            $table->date('fecha_retiro')->nullable();
            $table->string('motivo_salida')->nullable();
            $table->unsignedBigInteger('equiposPC_id');
            $table->foreign('equiposPC_id')->references('id')->on('equiposPC')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
