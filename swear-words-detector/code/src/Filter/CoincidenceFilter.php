<?php

declare(strict_types=1);

namespace App\Filter;

use App\Dictionary\DictionaryInterface;

final class CoincidenceFilter implements FilterInterface
{
    public function apply(DictionaryInterface $dictionary, string $text): string
    {
        foreach ($dictionary->jsonSerialize() as $word) {
            $text = (string) new Replace($word, $text);
        }

        return $text;
    }
}
