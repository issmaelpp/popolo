<?php

use App\Models\Group;
use App\Models\Organization;
use App\Models\People;
use App\Models\VoteEvent;
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
        Schema::create('motions', function (Blueprint $table) {
            $table->id();
            //$table->foreignIdFor(Organization::class)->constrained()->nullable();
            $table->foreignIdFor(Group::class)->constrained()->nullable();
            $table->foreignIdFor(VoteEvent::class)->constrained()->nullable();
            //$table->foreignIdFor(People::class)->constrained();
            $table->text('text')->fullText()->nullable();
            $table->string('identifier', 255)->unique(); // Identificador único para la moción (ej. número de expediente, etc.)
            $table->string('title', 255)->nullable(); // Título de la moción
            $table->string('classification', 40); // Clasificación de la moción (ej. "proyecto de ordenanza", "resolución", "declaración")
            $table->string('legislative_session_id')->nullable(); // ID de la sesión legislativa
            $table->timestamp('datetime'); // Fecha en que la moción fue propuesta
            $table->string('requirement', 40)->nullable(); // Requisito para que la moción sea aprobada (ej. "mayoría simple", "2/3 de los votos")
            $table->string('result', 40)->nullable(); // Resultado de la moción (ej. "aprobada", "rechazada", "retirada", "en debate")
            // Relaciones con personas
            //$table->string('creator_id')->nullable(); // ID del creador de la moción
            //$table->json('co_sponsors')->nullable(); // Array de IDs de co-patrocinadores
            // Contenido y detalles
            $table->longText('purpose')->nullable(); // Propósito de la moción
            $table->longText('summary')->nullable(); // Resumen de la moción
            // Metadatos y fuentes
            $table->json('sources')->nullable(); // URLs de fuentes
            $table->json('links')->nullable(); // Enlaces relacionados
            $table->json('attachments')->nullable(); // Documentos adjuntos
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
        Schema::dropIfExists('motions');
    }
};
