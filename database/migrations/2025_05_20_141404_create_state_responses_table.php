<?php

use App\Models\CivilRequest;
use App\Models\Organization;
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
        Schema::create('state_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CivilRequest::class)->constrained();
            $table->foreignIdFor(Organization::class)->constrained();
            $table->foreignIdFor(People::class)->constrained();
            $table->text('response')->fullText()->nullable();
            $table->timestamp('responded_at', 6)->nullable();
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_responses');
    }
};
