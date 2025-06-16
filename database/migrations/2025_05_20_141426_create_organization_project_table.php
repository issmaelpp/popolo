<?php

use App\Models\Organization;
use App\Models\Project;
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
        Schema::create('organization_project', function (Blueprint $table) {
            $table->foreignIdFor(Organization::class)->constrained();
            $table->foreignIdFor(Project::class)->constrained();
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
            
            $table->primary(['organization_id', 'project_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_project');
    }
};
