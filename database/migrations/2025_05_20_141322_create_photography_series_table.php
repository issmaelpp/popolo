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
        Schema::create('photography_series', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('slug', 255)->unique();
            $table->text('description')->fulltext()->nullable();
            $table->enum('status', GeneralStatusEnum::getValues());
            $table->string('image', 255);
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photography_series');
    }
};
