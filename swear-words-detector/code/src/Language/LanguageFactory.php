<?php

declare(strict_types=1);

namespace App\Language;

use LanguageDetection\Language as LanguageDetection;

/**
 * @psalm-immutable
 */
final class LanguageFactory
{
    public static function create(string $text): Language
    {
        $language = (new LanguageDetection(Language::supported()))->detect($text)->close();

        empty($language) && throw new LanguageNotDetectedException();

        $array = array_keys($language);

        return Language::from(array_shift($array));
    }
}
