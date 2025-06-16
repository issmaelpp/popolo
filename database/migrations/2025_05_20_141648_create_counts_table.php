<?php

use App\Models\Group;
use App\Models\Organization;
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
        Schema::create('counts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Group::class)->constrained()->nullable();
            $table->foreignIdFor(VoteEvent::class)->constrained()->nullable();
            //$table->foreignIdFor(Group::class)->constrained()->nullable();
            $table->string('option')->nullable(); // La opción votada (ej: "yes", "no", "abstain")
            $table->string('label')->nullable(); // Etiqueta descriptiva del conteo
            $table->text('note')->nullable(); // Notas adicionales sobre el conteo
            $table->json('sources')->nullable(); // URLs de fuentes
            $table->json('links')->nullable(); // Enlaces relacionados
            $table->string('external_id')->nullable(); // ID externo del sistema origen (para auditoria)
            $table->string('source_system')->nullable(); // Sistema de origen (para auditoria)
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counts');
    }
};
