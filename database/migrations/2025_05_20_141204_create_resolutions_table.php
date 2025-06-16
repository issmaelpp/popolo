<?php

use App\Enums\GeneralStatusEnum;
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
        Schema::create('resolutions', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 200)->unique(); // tiene que ser una combinacion de titulo y fecha
            $table->string('title', 150);
            $table->string('resolution_number', 10)->unique();
            $table->text('seen')->fullText()->nullable();
            $table->text('considering')->fullText()->nullable();
            $table->text('resolution')->fullText()->nullable();
            $table->date('date')->nullable();
            $table->enum('status', GeneralStatusEnum::getValues());
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resolutions');
    }
};
