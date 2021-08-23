<?php

declare(strict_types=1);

namespace App\Dictionary;

use JsonSerializable;

interface DictionaryInterface extends JsonSerializable
{
    public function jsonSerialize(): array;
}
