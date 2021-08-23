<?php

declare(strict_types=1);

namespace App\Filter;

use App\Dictionary\DictionaryInterface;

interface FilterInterface
{
    public function apply(DictionaryInterface $dictionary, string $text): string;
}
