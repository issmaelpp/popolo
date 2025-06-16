<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ArticleTypeEnum: string implements HasLabel
{
    case noticia = 'Noticia';
    case opinión = 'Opinión';
    case radio = 'Radio';
    case audiovisual = 'Audiovisual';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
