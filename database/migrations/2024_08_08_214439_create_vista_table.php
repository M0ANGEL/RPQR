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
        Schema::create('vista', function (Blueprint $table) {
            $table->id();
            $table->string('acttor');
            $table->string('vistamedica');
            $table->string('nombrevistamedica');
            $table->string('unidadmedica');
            $table->string('codigosebthi');
            $table->string('medicamento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vista');
    }
};
