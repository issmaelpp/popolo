<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MembershipTypeEnum: string implements HasLabel
{
    case jerárquico = 'Jerárquico';
    case prestador_de_servicio = 'Prestador de servicio';
    case planta_permanente = 'Planta permanente';
    case contrato = 'Contrato';
    case programa_de_formación_laboral = 'Programa de formación laboral';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
