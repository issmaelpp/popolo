<?php

use App\Enums\ArticleTypeEnum;
use App\Enums\GeneralStatusEnum;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(People::class)->constrained();
            $table->enum('type', ArticleTypeEnum::getValues());
            $table->string('slug', 200)->unique();
            $table->string('title', 160);
            $table->string('lead', 500)->nullable();
            $table->string('image', 255);
            $table->text('body')->fullText()->nullable();
            $table->enum('status', GeneralStatusEnum::getValues());
            $table->timestamp('published_at', 6)->nullable();
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
