<?php

declare(strict_types=1);

namespace MezzioSentryDelegator;

final class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'invokables' => [
                    ErrorListener::class => ErrorListener::class,
                ],
                'factories'  => [],
            ],
        ];
    }
}
