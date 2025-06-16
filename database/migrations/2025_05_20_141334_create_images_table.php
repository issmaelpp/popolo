<?php

use App\Models\Article;
use App\Models\PhotographySerie;
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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Article::class)->nullable()->constrained();
            $table->foreignIdFor(PhotographySerie::class)->nullable()->constrained();
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('path', 255);
            $table->date('date')->nullable();
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
