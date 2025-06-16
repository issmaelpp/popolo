<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ContactTypeEnum: string implements HasLabel
{
    case teléfono = 'Teléfono';
    case movil = 'Movil';
    case fax = 'Fax';
    case email = 'Email';
    case red_social = 'Red social';
    case web = 'Web';
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
            self::teléfono => 'success',
            self::movil => 'warning',
            self::fax => 'orange',
            self::email => 'info',
            self::red_social => 'purple',
            self::web => 'gray',
            self::otro => 'danger',
        };
    }
}