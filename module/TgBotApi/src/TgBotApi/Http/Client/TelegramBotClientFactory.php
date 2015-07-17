<?php
namespace TgBotApi\Http\Client;

use InvalidArgumentException;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TelegramBotClientFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        if (!isset($config['telegram'])) {
            throw new InvalidArgumentException('Missing "telegram" config key');
        }

        $telegramConfig = $config['telegram'];
        if (!isset($telegramConfig['token'])) {
            throw new InvalidArgumentException('Missing "token" telegram config key');
        }
        $service = new TelegramBotClient;
        $service->setToken($telegramConfig['token']);

        if (isset($telegramConfig['options'])) {
            $service->setOptions($telegramConfig['options']);
        }
        return $service;
    }

}
