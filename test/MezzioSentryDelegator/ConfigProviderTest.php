<?php

declare(strict_types=1);

namespace MezzioSentryDelegatorTest;

use MezzioSentryDelegator\ConfigProvider;
use MezzioSentryDelegator\ErrorListener;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ConfigProvider::class)]
final class ConfigProviderTest extends TestCase
{
    public function test___invoke(): void
    {
        $config = (new ConfigProvider())();

        self::assertArrayHasKey('dependencies', $config);
        self::assertIsArray($config['dependencies']);

        self::assertArrayHasKey('invokables', $config['dependencies']);
        self::assertIsArray($config['dependencies']['invokables']);
        self::assertArrayHasKey(ErrorListener::class, $config['dependencies']['invokables']);

        self::assertArrayHasKey('factories', $config['dependencies']);
        self::assertIsArray($config['dependencies']['factories']);
    }
}
