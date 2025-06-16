<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ClassificationEnum: string implements HasLabel
{
    case intendencia = 'Intendencia';
    case viceintendencia = 'Viceintendencia';
    case consejalía = 'Consejalía';
    case secretaría = 'Secretaría';
    case subsecretaría = 'Subsecretaría';
    case dirección = 'Dirección';
    case subdirección = 'Subdirección';
    case departamento = 'Departamento';
    case coordinación = 'Coordinación';
    case oficina = 'Oficina';
    case área = 'Área';
    case centro = 'Centro';
    case nexo = 'Nexo';
    case nc = 'NC';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
