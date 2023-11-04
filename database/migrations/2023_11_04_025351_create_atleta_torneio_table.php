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
        Schema::create('atleta_torneio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atleta_id');
            $table->foreign('atleta_id')
                ->references('id')
                ->on('atletas')
                ->onDelete('cascade');
            $table->unsignedBigInteger('torneio_id');
            $table->foreign('torneio_id')
                ->references('id')
                ->on('torneios')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atleta_torneio');
    }
};
