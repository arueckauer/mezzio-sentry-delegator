<?php

declare(strict_types=1);

namespace MezzioSentryDelegator;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Sentry\Options as SentryOptions;

use function Sentry\init;

class SentryInitializer
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): void
    {
        init($container->get('config')[SentryOptions::class]);
    }
}
