<?php

declare(strict_types=1);

namespace App\Filter;

use App\Dictionary\DictionaryInterface;

final class FilterCollection implements FilterInterface
{
    /**
     * @var \App\Filter\FilterInterface[]
     */
    private array $filters;

    public function __construct(FilterInterface ...$filters)
    {
        $this->filters = $filters;
    }

    public function apply(DictionaryInterface $dictionary, string $text): string
    {
        foreach ($this->filters as $filter) {
            $text = $filter->apply($dictionary, $text);
        }

        return $text;
    }
}
