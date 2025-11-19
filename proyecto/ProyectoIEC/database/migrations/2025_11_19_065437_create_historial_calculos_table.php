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
        Schema::create('historial_calculos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_calculo'); // periodos, capital, monto, renta
            $table->json('valores_entrada'); // todos los valores del formulario
            $table->decimal('resultado', 15, 6); // el resultado del calculo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_calculos');
    }
};
