<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AddressTypeEnum: string implements HasLabel
{
    case domicilio_legal = 'Legal';
    case domicilio_real = 'Real';
    case trabajo = 'Trabajo';
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
            self::domicilio_legal => 'success',
            self::domicilio_real => 'warning',
            self::trabajo => 'danger', //orange
            self::otro => 'info',
            /* self:: => 'purple',
            self:: => 'gray',
            self:: => 'danger', */
        };
    }
}
