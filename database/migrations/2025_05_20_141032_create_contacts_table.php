<?php

use App\Enums\ContactTypeEnum;
use App\Models\ForeignOrganization;
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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Organization::class)->nullable()->constrained();
            $table->foreignIdFor(ForeignOrganization::class)->nullable()->constrained(); 
            $table->foreignIdFor(People::class)->nullable()->constrained();
            $table->enum('type', ContactTypeEnum::getValues())->nullable();
            $table->string('value', 80)->nullable();
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
