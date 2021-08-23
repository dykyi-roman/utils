<?php

declare(strict_types=1);

namespace App\Filter;

use Stringable;

/**
 * @psalm-immutable
 */
final class Replace implements Stringable
{
    private string $value;

    public function __construct(string $word, string $text)
    {
        $this->value = str_ireplace(
            $word,
            implode('', array_fill(0, mb_strlen($word), '*')),
            $text
        );
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
