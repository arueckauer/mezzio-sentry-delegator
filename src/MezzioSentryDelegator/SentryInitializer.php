<?php

declare(strict_types=1);

namespace MezzioSentryDelegator;

use Psr\Container\ContainerInterface;
use Sentry\Options as SentryOptions;

use function Sentry\init;

class SentryInitializer
{
    public function __invoke(ContainerInterface $container): void
    {
        init($container->get('config')[SentryOptions::class]);
    }
}
