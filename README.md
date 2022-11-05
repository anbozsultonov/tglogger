## modelaudit/logging

**installing**

````
composer require tglogger/logchannel
````


# Use

````
add channel to 
config/logging.php
[
    'channels' => [ 
        //... 
        'telegram' => [
            'driver' => 'custom',
            'via' => \Tglogger\Logchannel\Logging\TelegramLoggerFactory::class,
            'logger_name' => 'telegram',
            'chat_id' => env('YOUR_CHAT_ID'),
            'token' => env('YOUR_TELEGRAM_LOGGER_BOT'),
            'level' => env('YOUR_LOG_LEVEL', 'debug'),
        ],
        //or 
        'your-channel-name' => [
            'driver' => 'custom',
            'via' => \Tglogger\Logchannel\Logging\TelegramLoggerFactory::class,
            'logger_name' => 'your_logger_name',
            'chat_id' => "your chat id",
            'token' => "token",
            'level' => "log level",
        ],
        //...
    ]
]
````

````

\Log::channel('telegram')
    ->debug('log text');
 //or
 
\Log::channel('your-channel-name')
    ->debug('log text');
 
````