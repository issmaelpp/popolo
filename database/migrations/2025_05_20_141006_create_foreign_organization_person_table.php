<?php

use App\Enums\TypeOfRelationshipEnum;
use App\Models\ForeignOrganization;
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
        Schema::create('foreign_organization_person', function (Blueprint $table) {
            $table->foreignIdFor(ForeignOrganization::class)->constrained();
            //$table->foreignIdFor(People::class)->constrained();
            $table->foreignId('person_id')->constrained('people');
            $table->enum('type', TypeOfRelationshipEnum::getValues());
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
            
            $table->primary(['foreign_organization_id', 'person_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreign_organization_person');
    }
};
