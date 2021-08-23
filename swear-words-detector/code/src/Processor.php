<?php

declare(strict_types=1);

namespace App;

use App\Dictionary\DictionaryFactory;
use App\Filter\FilterCollection;
use App\Language\LanguageFactory;

final class Processor
{
    private FilterCollection $filter;

    public function __construct(FilterCollection $filter)
    {
        $this->filter = $filter;
    }

    public function filter(string $text): string
    {
        return $this->filter->apply(DictionaryFactory::create(LanguageFactory::create($text)), $text);
    }
}
