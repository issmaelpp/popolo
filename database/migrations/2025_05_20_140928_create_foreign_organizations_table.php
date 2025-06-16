<?php

use App\Enums\ForeignOrganizationTypeEnum;
use App\Enums\GeneralStatusEnum;
use App\Models\Subcategory;
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
        Schema::create('foreign_organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subcategory::class)->constrained();
            $table->string('company_name', 120)->comment('Un nombre principal, un nombre legalmente reconocido, por ejemplo: Dirección de Legal y Técnica');
            $table->string('fantasy_name', 120)->nullable();
            $table->string('slug', 150)->unique()->comment('Slug único utilizado en las URL para identificar de forma clara y concisa a cada organización. Este campo se genera automáticamente a partir del nombre de la organización y se utiliza en las rutas para crear URLs amigables para los usuarios.');        
            $table->json('other_name')->nullable()->comment('Nombres alternativos o anteriores, por ejemplo: NUCE, Direccioón de obras Particulares');
            $table->enum('type', ForeignOrganizationTypeEnum::getValues());
            $table->string('abstract', 255)->nullable()->comment('Una descripción de una línea de una organización, por ejemplo: El Consejo Municipal de Paso de los Libres se establece de conformidad con la Ley de gobierno local de 1976');
            $table->text('description')->fullText()->nullable()->comment('Una descripción ampliada de una organización, por ejemplo: La Gaceta del Gobierno del Estado de Selangor Nº 62, Consejo Municipal de Subang Jaya fue publicada el 2 de enero de 1997...');
            $table->date('founding_date')->nullable();
            $table->date('dissolution_date')->nullable();
            $table->string('image_path', 255)->nullable();
            $table->enum('status', GeneralStatusEnum::getValues())->comment('El estado actual de una organización');
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreign_organizations');
    }
};
