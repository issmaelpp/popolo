<?php

use App\Enums\GenderEnum;
use App\Enums\GeneralStatusEnum;
use App\Models\User;
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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('family_name', 60)->comment('Apellido');
            $table->string('given_name', 60)->comment('Nombre primario');
            $table->string('additional_name', 60)->nullable()->comment('Nombre secundario');
            $table->json('other_name')->nullable()->comment('Si un concejal cambia de nombre, las transcripciones anteriores del consejo deben continuar con el nombre anterior');
            $table->string('honorific_prefix', 10)->nullable()->comment('Uno o más títulos honorificos que preceden al nombre de una persona, EJ: si a la persona se le ha otorgado un título honorifico, como señor, Dr, Prof, General o Padre, esto remplaza al Sr, Sra al comienzo del nombre. Si una persona tiene más de un título, normalmente se usan todos antes del nombre en lugar de Sr, Sra');
            $table->enum('gender', GenderEnum::getValues())->nullable();
            $table->date('birth_date')->nullable();
            $table->date('death_date')->nullable();
            $table->string('summary', 255)->nullable()->comment('Relato de una linea de la vida de una persona');
            $table->text('biography')->fullText()->nullable()->comment('Relato extendido de la vida de una persona');
            $table->enum('status', GeneralStatusEnum::getValues())->comment('El estado actual de una persona');
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
