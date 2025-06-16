<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum TypeOfRelationshipEnum: string implements HasLabel
{
    case propietario = 'Propietario';
    case gerente = 'Gerente';
    case socio = 'Socio';
    case encargado = 'Encargado';
    case gestor = 'Gestor';
    case representante_legal = 'Representante legal';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
