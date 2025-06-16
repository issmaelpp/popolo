<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SurfaceTypeEnum: string implements HasLabel
{
    case tierra = 'Tierra';
    case ripio = 'Ripio';
    case pavimento_flexible = 'Pavimento flexible';
    case pavimento_duro = 'Pavimento duro';
    case adoquín = 'Adoquín';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }
}