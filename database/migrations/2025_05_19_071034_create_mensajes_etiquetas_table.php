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
        Schema::create('mensajes_etiquetas', function (Blueprint $table) {
            
            $table->bigInteger('mensaje_id')->unsigned();
            $table->bigInteger('etiqueta_id')->unsigned();
            $table->timestamps();

            $table->primary(['mensaje_id', 'etiqueta_id']);
            $table->foreign('mensaje_id')->references('id')->on('mensajes')->onDelete('cascade');
            $table->foreign('etiqueta_id')->references('id')->on('etiquetas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes_etiquetas');
    }
};
