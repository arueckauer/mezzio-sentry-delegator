<?php

declare(strict_types=1);

namespace MezzioSentryDelegator;

use Laminas\ServiceManager\Factory\DelegatorFactoryInterface;
use Laminas\Stratigility\Middleware\ErrorHandler;
use Psr\Container\ContainerInterface;

use function assert;

class Delegator implements DelegatorFactoryInterface
{
    /**
     * @param string $name
     */
    public function __invoke(
        ContainerInterface $container,
        $name,
        callable $callback,
        ?array $options = null
    ): ErrorHandler {
        $errorHandler = $callback();
        assert($errorHandler instanceof ErrorHandler);

        $errorListener = $container->get(ErrorListener::class);
        assert($errorListener instanceof ErrorListener);

        $errorHandler->attachListener($errorListener);

        return $errorHandler;
    }
}
