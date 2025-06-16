<?php

use App\Models\Count;
use App\Models\Motion;
use App\Models\Organization;
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
        Schema::create('vote_events', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Organization::class)->constrained()->nullable();
            //$table->foreignIdFor(Motion::class)->constrained();
            //$table->foreignIdFor(Count::class)->constrained();
            $table->string('identifier', 255)->unique(); // Identificador único para el evento de votación (ej. "Voto No. 42")
            // Información básica del evento
            $table->string('label')->nullable(); // Etiqueta descriptiva del evento
            $table->text('description')->nullable(); // Descripción del evento de votación

            /* $table->string('classification', 40)->nullable(); // Categoría del evento de votación (ej. "votación nominal", "votación a mano alzada")
            $table->dateTime('start_date'); // Hora de inicio del evento de votación
            $table->dateTime('end_date')->nullable(); // Hora de finalización del evento de votación (puede ser nula si el evento aún no ha terminado)
            $table->string('result', 40); // Resultado general del evento de votación (ej. "Aprobada", "Rechazada")
            $table->text('group_result')->nullable(); // Resultado del evento de votación dentro de grupos de votantes (ej. "Aprobada por comisiones, rechazada por el pleno") */
            
            // Fechas y tiempo
            $table->date('start_date')->nullable(); // Fecha de inicio
            $table->date('end_date')->nullable(); // Fecha de fin
            $table->timestamp('start_datetime')->nullable(); // Fecha y hora de inicio específica
            $table->timestamp('end_datetime')->nullable(); // Fecha y hora de fin específica

            // Resultado y método de votación
            $table->string('result')->nullable(); // Resultado del evento (ej: "pass", "fail")
            $table->json('group_results')->nullable(); // Resultados por grupo/partido
            $table->string('vote_method')->nullable(); // Método de votación (ej: "voice", "division", "electronic")

            // Conteos principales
            $table->integer('yes_count')->default(0); // Total de votos a favor
            $table->integer('no_count')->default(0); // Total de votos en contra
            $table->integer('abstain_count')->default(0); // Total de abstenciones
            $table->integer('absent_count')->default(0); // Total de ausentes
            $table->integer('not_voting_count')->default(0); // Total que no votaron

            // Requisitos para aprobación
            $table->string('requirement')->nullable(); // Requisito para aprobación (ej: "majority", "two-thirds", "three-fifths")
            $table->integer('required_votes')->nullable(); // Número específico de votos requeridos

            // Contexto legislativo
            $table->string('legislative_session_id')->nullable(); // ID de la sesión legislativa
            $table->string('chamber')->nullable(); // Cámara donde se realizó (ej: "lower", "upper")

            // Información adicional
            $table->integer('vote_number')->nullable(); // Número de votación en la sesión
            $table->string('status')->nullable(); // Estado del evento (ej: "scheduled", "in_progress", "completed")

            // Metadatos y fuentes
            $table->json('sources')->nullable(); // URLs de fuentes
            $table->json('links')->nullable(); // Enlaces relacionados
            $table->text('note')->nullable(); // Notas adicionales

            // Campos de auditoría
            $table->string('external_id')->nullable(); // ID externo del sistema origen
            $table->string('source_system')->nullable(); // Sistema de origen
            
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vote_events');
    }
};
