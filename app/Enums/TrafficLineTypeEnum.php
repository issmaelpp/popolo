<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum TrafficLineTypeEnum: string implements HasLabel
{
    case ruta = 'Ruta';
    case avenida = 'Avenida';
    case calle = 'Calle';
    case pasaje = 'Pasaje';
    case otro = 'Otro';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
