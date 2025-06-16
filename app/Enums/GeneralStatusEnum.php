<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum GeneralStatusEnum: string implements HasLabel
{
    case activo = 'Activo'; //bg-green
    case proceso = 'Proceso'; //bg-yellow
    case revisión = 'Revisión'; //bg-orange
    case pendiente = 'Pendiente'; //bg-blue
    case resuelto = 'Resuelto'; //bg-purple
    case cerrado = 'Cerrado'; //bg-gray
    case inactivo = 'Inactivo'; //bg-red

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::activo => 'success',
            self::proceso => 'warning',
            self::revisión => 'orange',
            self::pendiente => 'info',
            self::resuelto => 'purple',
            self::cerrado => 'gray',
            self::inactivo => 'danger',
        };
    }
}
