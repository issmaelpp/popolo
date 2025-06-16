<?php

use App\Enums\DimensionMeasureEnum;
use App\Enums\DimensionTypeEnum;
use App\Models\CulturalCycle;
use App\Models\Domain;
use App\Models\InternationalClassification;
use App\Models\Subdomain;
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
        Schema::create('dimensions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(InternationalClassification::class)->nullable()->constrained();
            $table->foreignIdFor(CulturalCycle::class)->nullable()->constrained();
            $table->foreignIdFor(Domain::class)->nullable()->constrained();
            $table->foreignIdFor(Subdomain::class)->nullable()->constrained();
            $table->string('code', 15)->nullable();
            $table->text('note')->nullable();
            $table->string('label', 600)->index();
            $table->enum('measure', DimensionMeasureEnum::getValues())->nullable();
            $table->enum('type', DimensionTypeEnum::getValues())->nullable();
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dimensions');
    }
};
