<?php

declare(strict_types=1);

namespace App\Language;

use MyCLabs\Enum\Enum;

/**
 * @psalm-immutable
 */
final class Language extends Enum
{
    public const ENGLISH = 'en';
    public const RUSSIAN = 'ru';

    public static function supported(): array
    {
        return [
            self::ENGLISH,
            self::RUSSIAN
        ];
    }
}
