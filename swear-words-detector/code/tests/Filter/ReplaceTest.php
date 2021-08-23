<?php

declare(strict_types=1);

namespace App\Tests\Filter;

use App\Filter\Replace;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass App\Filter\Replace
 */
final class ReplaceTest extends TestCase
{
    public function testReplaceWord(): void
    {
        self::assertSame((string) new Replace('big', 'my big word'), 'my *** word');
    }
}
