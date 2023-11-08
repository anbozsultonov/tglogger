<?php

namespace Tglogger\Logchannel\Logging;

use Tglogger\Logchannel\Services\Telegram\TelegramBotApi;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

final class TelegramLoggerHandler extends AbstractProcessingHandler
{
    protected int $chatId;

    protected string $token;

    public function __construct(array $config)
    {
        $this->chatId = $config['chat_id'];
        $this->token = $config['token'];

        $level = Logger::toMonologLevel($config['level']);

        parent::__construct($level);
    }

    public function write(array $record): void
    {
        $text = is_array($record) ? $record['formatted'] : $record->formatted;

        TelegramBotApi::sendMessage(
            $this->token,
            $this->chatId,
            $text
        );
    }
}
