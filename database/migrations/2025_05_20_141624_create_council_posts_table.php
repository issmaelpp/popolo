<?php

use App\Enums\GeneralStatusEnum;
use App\Models\Organization;
use App\Models\Tag;
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
        Schema::create('council_posts', function (Blueprint $table) {
            $table->id();
            //$table->foreignIdFor(Tag::class); // Tags o etiquetas
            $table->foreignId('person_id')->constrained('people'); // Autor del post
            //$table->foreignIdFor(Organization::class); // ID de organización
            $table->string('title', 255)->nullable(); // Título del post
            $table->text('content')->fulltext()->nullable(); // Contenido del post
            $table->string('type')->nullable(); // Tipo de post
            $table->enum('status', GeneralStatusEnum::getValues())->default(GeneralStatusEnum::pendiente->value); // Estado del post
            $table->string('url', 255)->nullable(); // URL del post original
            $table->string('source_url', 255)->nullable(); // URL de la fuente
            $table->json('metadata')->nullable(); // Metadatos adicionales en JSON
            $table->string('external_id', 255)->nullable(); // ID externo para auditoría
            $table->string('source', 255)->nullable(); // Fuente de los datos para auditoría
            $table->timestamp('published_at')->nullable(); // Fecha de publicación
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);

            $table->primary(['person_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('council_posts');
    }
};
