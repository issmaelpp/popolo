<?php

use App\Enums\TrafficLineTypeEnum;
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
        Schema::create('traffic_lines', function (Blueprint $table) {
            $table->id();
            $table->enum('traffic_line_type', TrafficLineTypeEnum::getValues());
            $table->string('name', 80);
            $table->string('full_name', 120)->unique();
            $table->string('slug', 150)->unique();
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
        Schema::dropIfExists('traffic_lines');
    }
};
