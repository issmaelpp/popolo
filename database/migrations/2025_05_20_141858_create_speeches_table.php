<?php

use App\Models\People;
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
        Schema::create('speeches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(People::class, 'creator_id')->constrained(); // creator_id // Referencia al orador (persona)
            //$table->foreignIdFor(People::class)->constrained(); // audience_id // Referencia al publico (persona)
            $table->string('role', 40)->nullable(); // Rol del orador, e.g., 'speaker'
            $table->string('attribution_text', 255)->nullable(); // Texto de atribución
            $table->text('text')->fullText()->nullable(); // Texto del discurso
            $table->string('audio', 255)->nullable(); // URL del audio
            $table->string('video', 255)->nullable(); // URL del video
            $table->date('date')->nullable(); // Fecha del discurso
            $table->timestamp('start_date')->nullable(); // Fecha y hora de inicio
            $table->timestamp('end_date')->nullable(); // Fecha y hora de fin
            $table->string('title', 250)->nullable(); // Título del discurso
            $table->string('type', 40)->nullable(); // Tipo, e.g., 'speech', 'scene'
            $table->integer('position')->nullable(); // Posición en la transcripción
            $table->string('event_id', 255)->nullable(); // Referencia al evento
            $table->string('section')->nullable(); // Sección del evento
            // Referencias externas
            $table->json('sources')->nullable(); // URLs de fuentes
            $table->json('links')->nullable(); // Enlaces relacionados
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
        Schema::dropIfExists('speeches');
    }
};
