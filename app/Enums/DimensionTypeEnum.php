<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum DimensionTypeEnum: string implements HasLabel
{
    case dominios_culturales = 'Dominios culturales';
    case dominios_transversales = 'Dominios transversales';
    case dominios_relacionados = 'Dominios relacionados';
    case equipamiento_y_materiales_de_apoyo_de_dominios_culturales = 'Equipamiento y materiales de apoyo de dominios culturales';
    case equipamiento_y_materiales_de_apoyo_de_dominios_relacionados = 'Equipamiento y materiales de apoyo de dominios relacionados';
    case bienes_culturales = 'Bienes culturales';
    case bienes_relacionados = 'Bienes relacionados';
    case equipamiento_y_materiales_de_apoyo_de_bienes_culturales = 'Equipamiento y materiales de apoyo de bienes culturales';
    case equipamiento_y_materiales_de_apoyo_de_bienes_relacionados = 'Equipamiento y materiales de apoyo de bienes relacionados';
    case ocupaciones_culturales = 'Ocupaciones culturales';
    case ocupaciones_de_dominios_relacionados = 'Ocupaciones de dominios relacionados';
    case equipamiento_y_materiales_de_apoyo_de_ocupaciones_culturales = 'Equipamiento y materiales de apoyo de ocupaciones culturales';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
