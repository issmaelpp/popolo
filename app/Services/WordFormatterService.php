<?php
namespace App\Services;

class WordFormatterService
{
    private const EXCLUDED_WORDS = [
        'a', 'al', 'ante', 'bajo', 'con', 'contra', 'como', 'de', 'del', 'desde', 'durante', 'e', 'el', 'en', 'entre', 'hacia', 'hasta', 'la', 'las', 'lo', 'los', 'mas', 'mediante', 'ni', 'o', 'para', 'pero', 'por', 'pues', 'que', 'según', 'si', 'sin', 'sino', 'sobre', 'tras', 'u', 'un', 'una', 'unas', 'unos', 'versus', 'vía', 'y'
    ];

    public function format(string $name): string
    {
        $cleanedName = trim(preg_replace('/\s+/', ' ', $name));
        return collect(explode(' ', $cleanedName))
            ->map(function (string $word) {
                if ($this->isAcronym($word)) {
                    return $word;
                }
                $lowercaseWord = mb_strtolower($word, 'UTF-8');
                if (in_array($lowercaseWord, self::EXCLUDED_WORDS, true)) {
                    return $lowercaseWord;
                }
                return mb_convert_case($lowercaseWord, MB_CASE_TITLE, 'UTF-8');
            })
            ->join(' ');
    }

    private function isAcronym(string $word): bool
    {
        return preg_match('/^[A-Z]+(\.[A-Z]+)*$/', $word) === 1;
    }

    public function formatPath(string $path): string {
        $path = preg_replace('#^/administracion/#', '', $path);
        $parts = explode('/', $path);
        $lastPart = end($parts);
        $formatted = str_replace('-', ' ', $lastPart);
        $formatted = mb_convert_case($formatted, MB_CASE_TITLE, 'UTF-8');

        $formatted = $this->format($formatted);
    
        return $formatted;
    }
}
