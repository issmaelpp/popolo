<?php

use App\Enums\GeneralStatusEnum;
use App\Enums\ProjectTypeEnum;
use App\Enums\TypeOfWorkEnum;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('slug', 255)->unique();
            $table->text('description')->fulltext();
            $table->enum('status', GeneralStatusEnum::getvalues());
            $table->enum('project_type', ProjectTypeEnum::getValues())->nullable();
            $table->enum('type_of_work', TypeOfWorkEnum::getValues())->nullable();
            $table->json('coordinate')->nullable();
            $table->string('localization', 255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
