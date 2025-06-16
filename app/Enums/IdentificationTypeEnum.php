<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum IdentificationTypeEnum: string implements HasLabel
{
    case dni = 'D.N.I.';
    case cuit = 'C.U.I.T.';
    case cuil = 'C.U.I.L.';
    case dgr = 'D.G.R.';
    case cedula = 'Cedula';
    case pasaporte = 'Pasaporte';
    //case cedula_extranjera = 'Cedula extranjera';
    case otro = 'Otro';

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
            self::dni => 'success',
            self::cuit => 'warning',
            self::cuil => 'orange',
            self::dgr => 'info',
            self::cedula => 'purple',
            self::pasaporte => 'gray',
            self::otro => 'danger',
        };
    }
}
