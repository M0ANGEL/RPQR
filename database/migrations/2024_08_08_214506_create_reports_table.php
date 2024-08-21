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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('fechareporte');
            $table->string('redservicio');
            $table->string('huvservicio');
            $table->longText('reporte');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            /* correctivo*/
            $table->string('rechazado')->nullable();
            $table->string('tipo_accion')->nullable();
            $table->string('regente')->nullable();
            $table->string('estado')->default(0);
            $table->string('porque1')->nullable();
            $table->string('respuesta_porque1')->nullable();
            $table->string('porque2')->nullable();
            $table->string('respuesta_porque2')->nullable();
            $table->string('porque3')->nullable();
            $table->string('respuesta_porque3')->nullable();
            $table->string('porque4')->nullable();
            $table->string('respuesta_porque4')->nullable();
            $table->string('porque5')->nullable();
            $table->string('respuesta_porque5')->nullable();
            $table->string('causa_raiz')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
