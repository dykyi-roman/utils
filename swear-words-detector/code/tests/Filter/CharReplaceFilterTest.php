<?php

declare(strict_types=1);

namespace App\Tests\Filter;

use App\Dictionary\DictionaryFactory;
use App\Filter\Char;
use App\Filter\CharReplaceFilter;
use App\Language\Language;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass App\Filter\CharReplaceFilter
 */
final class CharReplaceFilterTest extends TestCase
{
    /**
     * @covers ::apply
     *
     * @dataProvider textDataProvider
     */
    public function testFilter(string $text, string $result, Char $char): void
    {
        $filter = new CharReplaceFilter($char);

        self::assertSame($result, $filter->apply(DictionaryFactory::create(Language::from(Language::ENGLISH)), $text));
    }

    public function textDataProvider(): Generator
    {
        yield 'text with * symbol' => ['s*ck my big d*ck b*tch', '**** my big **** *****', new Char('*')];
        yield 'text with 1 symbol' => ['s*ck my big d1ck b1tch', 's*ck my big **** *****', new Char('1')];
        yield 'text with 0 symbol' => ['s*ck my big d*ck Ch0ad', 's*ck my big d*ck *****', new Char('0')];
    }
}
