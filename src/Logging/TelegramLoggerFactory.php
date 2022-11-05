<?php

namespace Tglogger\Logchannel\Logging;

use Monolog\Logger;

final class TelegramLoggerFactory
{
    public function __invoke(array $config): Logger
    {
        $logger = new Logger($config['logger_name']);
        $logger->pushHandler(new TelegramLoggerHandler($config));

        return $logger;
    }
}
