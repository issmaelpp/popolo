<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum TypeOfWorkEnum: string implements HasLabel
{
    case equipamiento_habitacional = 'Equipamiento habitacional';
    case equipamiento_urbano_social_recreativo = 'Equipamiento urbano social recreativo';
    case equipamiento_educacional = 'Equipamiento educacional';
    case equipamiento_deportivo_recreativo = 'Equipamiento deportivo recreativo';
    case equipamiento_deportivo = 'Equipamiento deportivo';
    case equipamiento_sanitario = 'Equipamiento sanitario';
    case equipamiento_administrativo = 'Equipamiento administrativo';
    case equipamiento_cultural = 'Equipamiento cultural';
    case infraestructura_de_red_cloacal = 'Infraestructura de red cloacal';
    case infraestructura_de_red_cloacal_y_red_de_agua = 'Infraestructura de red cloacal y red de agua';
    case red_de_desagües_pluviales = 'Red de desagües pluviales';
    case energía_eléctrica = 'Energía eléctrica';
    case infraestructura_vial = 'Infraestructura vial';
    case infraestructura_vial_recreativa = 'Infraestructura vial recreativa';
    case infraestructura_hidráulica = 'Infraestructura hidráulica';
    case infraestructura_ambiental = 'Infraestructura ambiental';
    case otros = 'Otros';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
