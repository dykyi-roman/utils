<?php

declare(strict_types=1);

namespace App\Tests\Language;

use App\Language\Language;
use App\Language\LanguageFactory;
use App\Language\LanguageNotDetectedException;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass App\Language\LanguageFactory
 */
final class LanguageFactoryTest extends TestCase
{
    /**
     * @covers ::create
     *
     * @dataProvider textDataProvider
     */
    public function testLanguageIsDefined(string $text, Language $language): void
    {
        self::assertTrue($language->equals(LanguageFactory::create($text)));
    }

    /**
     * @covers ::create
     */
    public function testLanguageIsNotDefined(): void
    {
        $this->expectException(LanguageNotDetectedException::class);

        LanguageFactory::create('21412412');
    }

    public function textDataProvider(): Generator
    {
        yield 'Russian language text' => ['русский текст', Language::from(Language::RUSSIAN)];
        yield 'English language text' => ['english text', Language::from(Language::ENGLISH)];
    }
}
