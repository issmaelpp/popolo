<?php

use App\Models\Neighborhood;
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
        Schema::create('history_ofs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TrafficLine::class)->nullable()->constrained();
            $table->foreignIdFor(Neighborhood::class)->nullable()->constrained();
            $table->string('title', 200)->nullable();
            $table->string('slug', 255)->unique();
            $table->text('content')->fullText();
            $table->boolean('is_public')->default(false);
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_ofs');
    }
};
