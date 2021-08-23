<?php

declare(strict_types=1);

namespace App\Filter;

use Stringable;
use Webmozart\Assert\Assert;

final class Char implements Stringable
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::maxLength($value, 1);

        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
