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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(VoteEvent::class)->constrained()->nullable();
            $table->foreignIdFor(People::class, 'voter_id')->constrained(); // voter_id
            $table->foreignIdFor(People::class, 'pair_id')->constrained(); // pair_id
            //$table->foreignIdFor(Organization::class)->constrained()->nullable(); // political_group_id
            $table->foreignIdFor(Group::class)->constrained()->nullable();
            //$table->string('voter_type', 40); // 'person' o 'organization'
            $table->string('option', 20); // e.g., 'yes', 'no', 'abstain'
            $table->string('role', 40)->nullable(); // Rol del votante en el momento de la votación
            $table->decimal('weight', 10, 4)->default(1); // Peso del voto (por defecto 1)
            $table->boolean('paired')->default(false); // Si el voto está emparejado
            //$table->string('paired_vote_id')->nullable(); // ID del voto con el que está emparejado
            // Contexto y justificación
            $table->text('note')->nullable(); // Nota o justificación del voto
            $table->string('vote_method')->nullable(); // Método de votación usado
            // Timestamps del voto
            $table->timestamp('vote_date')->nullable(); // Fecha y hora específica del voto
            // Metadatos y fuentes
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
        Schema::dropIfExists('votes');
    }
};
