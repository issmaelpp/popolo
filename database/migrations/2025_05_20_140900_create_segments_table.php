<?php

use App\Enums\OrientationEnum;
use App\Enums\SurfaceTypeEnum;
use App\Models\TrafficLine;
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
        Schema::create('segments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TrafficLine::class)->constrained();
            $table->enum('surface_type', SurfaceTypeEnum::getValues())->nullable();
            $table->enum('orientation', OrientationEnum::getValues())->nullable();
            $table->json('coordinate')->nullable();
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('segments');
    }
};
