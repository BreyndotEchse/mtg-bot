<?php
return [
    'hydrators' => [
        'invokables' => [
            'TgBotApi\Hydrator\RecursiveTypeHintClassMethods' => 'TgBotApi\Hydrator\RecursiveTypeHintClassMethods',
        ],
        'aliases' => [
            'RecursiveTypeHintClassMethods' => 'TgBotApi\Hydrator\RecursiveTypeHintClassMethods',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'TgBotApi\Http\Client\TelegramBotClient' => 'TgBotApi\Http\Client\TelegramBotClientFactory',
        ],
        'aliases' => [
            'TelegramBotClient' => 'TgBotApi\Http\Client\TelegramBotClient',
        ],
    ],
];