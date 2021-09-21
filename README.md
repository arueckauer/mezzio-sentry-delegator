# mezzio-sentry-delegator

Mezzio Delegator and ErrorListener for Sentry

This component integrates capturing of Throwables in Sentry by providing a `Listener` for the [Stratigility `ErrorHandler` middleware](https://docs.laminas.dev/laminas-stratigility/v3/error-handlers/#handling-php-errors-and-exceptions). Two steps are required for the setup.

## Installation

Via Composer

```shell
composer require arueckauer/mezzio-sentry-delegator
```

## Configuration

Provide a dsn for Sentry and possible other [configuration options](https://docs.sentry.io/platforms/php/configuration/) in the project's configuration, e.g. `config/autoload/services.local.php`. Go to the [PHP configure documentation](https://docs.sentry.io/platforms/php/#configure) to select the dsn for a project.

```php
<?php

declare(strict_types = 1);

use Sentry\Options as SentryOptions;

return [
    // [..]
    SentryOptions::class => [
        'dsn' => 'https://<key>@<account-id>.ingest.sentry.io/<project-id>',
    ],
];

```

## Initialize Sentry

To initialize Sentry, add the following line to the anonymous function in `public/index.php`.

```php
(new MezzioSentryDelegator\SentryInitializer())($container);
```

## Attach Listener by wiring delegator

Declare the delegator dependency in the project's configuration, e.g. `config/autoload/dependencies.global.php`.

```php
<?php

declare(strict_types = 1);

use MezzioSentryDelegator\Delegator;
use Laminas\Stratigility\Middleware\ErrorHandler;

class ConfigProvider
{
    public function __invoke() : array
    {
        return [
            'dependencies' => [
                'delegators' => [
                    ErrorHandler::class => [
                        Delegator::class,
                    ],
                ],
            ],
        ];
    }
}

```
