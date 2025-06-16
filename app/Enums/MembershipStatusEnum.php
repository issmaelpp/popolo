<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MembershipStatusEnum: string implements HasLabel
{
    case activo = 'Activo';
    case licencia_médica = 'Licencia médica';
    case permiso = 'Permiso';
    case vacaciones = 'Vacaciones';
    case suspendido = 'Suspendido';
    case inactivo = 'Inactivo';

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
            self::licencia_médica => 'warning',
            self::permiso => 'orange',
            self::vacaciones => 'info',
            self::suspendido => 'gray',
            self::inactivo => 'danger',
        };
    }
}
