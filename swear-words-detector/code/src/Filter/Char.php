<?php

declare(strict_types=1);

namespace App\Filter;

use Stringable;

final class Char implements Stringable
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
