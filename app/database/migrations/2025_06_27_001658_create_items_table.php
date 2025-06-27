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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('elementos'); // Elementos
            $table->text('observaciones')->nullable(); // OBSERVACIONES
            $table->string('estado')->nullable(); // Estado
            $table->string('uso')->nullable(); // Uso
            $table->string('ubicacion')->nullable(); // Ubicación
            $table->string('destino')->nullable(); // Destino
            $table->text('observaciones_detalle')->nullable(); // Observaciones (second column)
            $table->string('movimiento')->nullable(); // Movimiento
            $table->date('fecha')->nullable(); // Fecha
            $table->string('ubicacion_original')->nullable(); // Ubicación original
            $table->string('destino_original')->nullable(); // Destino original
            $table->string('clasificacion_ruba')->nullable(); // Clasificación RUBA
            $table->string('carga_ruba')->nullable(); // Carga Ruba
            $table->string('estado_general')->nullable(); // ESTADO
            $table->string('nueva_ubicacion')->nullable(); // NUEVA UBICACIÓN
            $table->string('destino_final')->nullable(); // DESTINO
            $table->string('operador')->nullable(); // OPERADOR
            $table->date('fecha_actualizacion_inventario')->nullable(); // Fecha actualización Inventario
            $table->string('operador_carga')->nullable(); // Operador carga
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
