<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum OrientationEnum: string implements HasLabel
{
    case norte = 'Norte';
    case sur = 'Sur';
    case este = 'Este';
    case oeste = 'Oeste';
    case noroeste = 'Noroeste';
    case noreste = 'Noreste';
    case suroeste = 'Suroeste';
    case sureste = 'Sureste';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
