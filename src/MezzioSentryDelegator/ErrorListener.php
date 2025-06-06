<?php

declare(strict_types=1);

namespace MezzioSentryDelegator;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Throwable;

use function Sentry\captureException;

final class ErrorListener
{
    public function __invoke(
        Throwable $exception,
        ServerRequestInterface $request,
        ResponseInterface $response
    ): void {
        captureException($exception);
    }
}
