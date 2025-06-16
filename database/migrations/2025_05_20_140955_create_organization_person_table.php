<?php

use App\Enums\MembershipRoleEnum;
use App\Enums\MembershipStatusEnum;
use App\Enums\MembershipTypeEnum;
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
        Schema::create('organization_person', function (Blueprint $table) {
            $table->foreignIdFor(Organization::class)->constrained();
            //$table->foreignIdFor(People::class)->constrained();
            $table->foreignId('person_id')->constrained('people');
            $table->enum('role' , MembershipRoleEnum::getValues())->nullable();
            $table->enum('membership_status', MembershipStatusEnum::getValues())->nullable();
            $table->enum('type', MembershipTypeEnum::getValues())->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('cessation_reason')->fullText()->nullable();
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
            
            $table->primary(['organization_id', 'person_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_person');
    }
};
