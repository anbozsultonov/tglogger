<?php

namespace Tglogger\Logchannel\Services\Telegram;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

final class TelegramBotApi
{
    public const HOST = "https://api.telegram.org/bot";

    public static function sendMessage(string $token, int $chatId, string $text): void
    {
        try {
            Http::get(
                self::HOST . $token . '/sendMessage',
                [
                    'chat_id' => $chatId,
                    'text' => $text
                ]
            );
        } catch (\Exception $e) {
            Log::error(json_encode([
                'telegram' => $e->getMessage()
            ], JSON_THROW_ON_ERROR));
        }
    }
}
