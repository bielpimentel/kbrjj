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
        Schema::create('torneios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('imagem');
            $table->string('cidade');
            $table->string('estado');
            $table->date('data');
            $table->text('sobre');
            $table->text('ginasio');
            $table->text('infos_gerais');
            $table->text('entrada_publico')->nullable();
            $table->string('tipo');
            $table->string('fase');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneios');
    }
};
