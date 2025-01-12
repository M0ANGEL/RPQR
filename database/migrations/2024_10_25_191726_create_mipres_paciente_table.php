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
        Schema::create('mipres_paciente', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('documento')->unique();
            $table->string('tipoDocumento');
            $table->string('historia');
            $table->string('numeroId');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mipres_paciente');
    }
};
