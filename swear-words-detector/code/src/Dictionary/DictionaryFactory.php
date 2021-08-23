<?php

declare(strict_types=1);

namespace App\Dictionary;

use App\Language\Language;
use RuntimeException;

/**
 * @psalm-immutable
 */
final class DictionaryFactory
{
    public static function create(Language $language): DictionaryInterface
    {
        return match ($language->getValue()) {
            Language::RUSSIAN => new Russian(),
            Language::ENGLISH => new English(),
            default => throw new RuntimeException(),
        };
    }
}
