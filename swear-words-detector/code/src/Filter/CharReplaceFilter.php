<?php

declare(strict_types=1);

namespace App\Filter;

use App\Dictionary\DictionaryInterface;

final class CharReplaceFilter implements FilterInterface
{
    private Char $char;

    public function __construct(Char $char)
    {
        $this->char = $char;
    }

    public function apply(DictionaryInterface $dictionary, string $text): string
    {
        $words = $this->findWordsForReplace($text, (string) $this->char);
        foreach ($words as $word) {
            $this->replace($dictionary, $word, $text);
        }

        return $text;
    }

    private function replace(DictionaryInterface $dictionary, string $word, string &$text): void
    {
        foreach ($dictionary->jsonSerialize() as $item) {
            if (mb_strlen($item) !== mb_strlen($word)) {
                continue;
            }

            $item[strpos($word, (string) $this->char)] = $this->char;
            if (0 === strcasecmp($item, $word)) {
                $text = (string) new Replace($word, $text);
            }
        }
    }

    private function findWordsForReplace(string $text, string $char): array
    {
        $words = explode(' ', $text);
        $array = array_filter($words, static fn (string $word): bool => !preg_match('/^(.)\**$/u', $word));

        return array_filter($array, static fn (string $word): bool => 0 < substr_count($word, $char));
    }
}
