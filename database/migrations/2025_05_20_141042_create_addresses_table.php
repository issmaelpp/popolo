<?php

use App\Enums\AddressTypeEnum;
use App\Models\ForeignOrganization;
use App\Models\Neighborhood;
use App\Models\Organization;
use App\Models\People;
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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Organization::class)->nullable()->constrained(); // Al eliminar una organizacion tambien se eliminara su direccion
            $table->foreignIdFor(ForeignOrganization::class)->nullable()->constrained();
            $table->foreignIdFor(People::class)->nullable()->constrained(); // Al eliminar una persona tambien se eliminara su direccion
            $table->foreignIdFor(Neighborhood::class)->nullable()->constrained();
            $table->foreignIdFor(TrafficLine::class)->nullable()->constrained();
            $table->string('height', 10)->nullable();
            $table->string('house_number', 10)->nullable();
            $table->string('plot_number', 10)->nullable()->comment('Número de parcela o lote');
            $table->string('field_number', 10)->nullable()->comment('Número de chacra');
            $table->string('floor_number', 3)->nullable();
            $table->string('additional_description', 255)->nullable();
            $table->json('coordinate')->nullable();
            $table->enum('type', AddressTypeEnum::getValues())->nullable();
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
