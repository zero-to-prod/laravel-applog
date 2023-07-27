<?php

namespace Zerotoprod\AppLog;

use Monolog\Logger;

class AppLogger
{
    /**
     * @see DbLoggingTest
     */
    public function __invoke(array $config): Logger
    {
        return (new Logger("DatabaseLogger"))->pushHandler(new AppLogHandler);
    }
}
