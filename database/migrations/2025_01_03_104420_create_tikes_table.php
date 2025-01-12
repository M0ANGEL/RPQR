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
        Schema::create('tikes', function (Blueprint $table) {
            $table->id();
            $table->string('usuario_reporta');
            $table->string('categoria');
            $table->string('subcategoria');
            $table->longText('detalle');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('estado')->default(0);
            $table->string('calificacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikes');
    }
};
