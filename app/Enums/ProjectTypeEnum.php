<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ProjectTypeEnum: string implements HasLabel
{
    case en_proyecto = 'En Proyecto';
    case en_ejecución = 'En Ejecución';
    case ejecutado = 'Ejecutado';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
