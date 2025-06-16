<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MembershipRoleEnum: string implements HasLabel
{
    case intendente = 'Intendente';
    case viceintendente = 'Viceintendente';
    //case concejal = 'Concejal';
    case secretario = 'Secretario';
    case subsecretario = 'Subsecretario';
    case director = 'Director';
    case subdirector = 'Subdirector';
    case encargado = 'Encargado';
    case coordinador = 'Coordinador';
    case auxiliar_administrativo = 'Auxiliar administrativo';
    case inspector = 'Inspector';
    case maestranza = 'Maestranza';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
